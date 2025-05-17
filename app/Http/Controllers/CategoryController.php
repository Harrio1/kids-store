<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получаем только корневые категории с их подкатегориями
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();
            
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Получаем категории для мальчиков
        $boyCategoriesForSelect = $this->getCategoriesByType('%мальчик%|%boy%', 'name');
        
        // Получаем категории для девочек
        $girlCategoriesForSelect = $this->getCategoriesByType('%девочк%|%girl%', 'name');
        
        // Получаем категории для новорожденных
        $babyCategoriesForSelect = $this->getCategoriesByType('%новорожденн%|%baby%', 'name');
        
        return view('admin.categories.create', compact(
            'boyCategoriesForSelect', 
            'girlCategoriesForSelect', 
            'babyCategoriesForSelect'
        ));
    }
    
    /**
     * Получает категории по типу
     */
    private function getCategoriesByType(string $pattern, string $field = 'name')
    {
        $categories = Category::where($field, 'LIKE', $pattern)
            ->orWhere('slug', 'LIKE', $pattern)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_type' => 'required|string|in:boys,girls,babies',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Добавляем префикс к названию и slug в зависимости от типа, если это корневая категория
        if (empty($data['parent_id'])) {
            $prefixData = $this->getCategoryPrefix($data['category_type']);
            
            // Обновляем название только если в нем еще нет префикса
            if (!str_contains(strtolower($data['name']), $prefixData['name_prefix'])) {
                $data['name'] = $prefixData['name_full'] . ' ' . $data['name'];
            }
            
            // Обновляем slug только если в нем еще нет префикса
            if (!str_contains($data['slug'], $prefixData['slug_prefix'])) {
                $data['slug'] = $prefixData['slug_prefix'] . '-' . $data['slug'];
            }
        }
        
        // Удаляем поле типа категории, так как оно не нужно для сохранения
        unset($data['category_type']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Категория успешно создана');
    }
    
    /**
     * Возвращает префиксы для названия и slug в зависимости от типа категории
     */
    private function getCategoryPrefix(string $type): array
    {
        switch ($type) {
            case 'boys':
                return [
                    'name_prefix' => 'мальчик',
                    'name_full' => 'Для мальчиков',
                    'slug_prefix' => 'boys'
                ];
            case 'girls':
                return [
                    'name_prefix' => 'девочк',
                    'name_full' => 'Для девочек',
                    'slug_prefix' => 'girls'
                ];
            case 'babies':
                return [
                    'name_prefix' => 'новорожденн',
                    'name_full' => 'Для новорожденных',
                    'slug_prefix' => 'babies'
                ];
            default:
                return [
                    'name_prefix' => '',
                    'name_full' => '',
                    'slug_prefix' => ''
                ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Display the category page to visitors.
     */
    public function view(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $subcategories = $category->children()->where('is_active', true)->get();
        $products = $category->products()->where('is_active', true)->paginate(12);
        
        return view('categories.view', compact('category', 'subcategories', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Получаем категории для мальчиков
        $boyCategoriesForSelect = $this->getCategoriesByType('%мальчик%|%boy%', 'name');
        
        // Получаем категории для девочек
        $girlCategoriesForSelect = $this->getCategoriesByType('%девочк%|%girl%', 'name');
        
        // Получаем категории для новорожденных
        $babyCategoriesForSelect = $this->getCategoriesByType('%новорожденн%|%baby%', 'name');
        
        // Определяем тип категории для предварительного выбора
        $categoryType = $this->determineCategoryType($category);
        
        return view('admin.categories.edit', compact(
            'category',
            'boyCategoriesForSelect', 
            'girlCategoriesForSelect', 
            'babyCategoriesForSelect',
            'categoryType'
        ));
    }
    
    /**
     * Определяет тип категории на основе ее названия или slug
     */
    private function determineCategoryType(Category $category): string
    {
        $name = strtolower($category->name);
        $slug = strtolower($category->slug);
        
        if (str_contains($name, 'мальчик') || str_contains($name, 'boy') || str_contains($slug, 'boy')) {
            return 'boys';
        } else if (str_contains($name, 'девочк') || str_contains($name, 'girl') || str_contains($slug, 'girl')) {
            return 'girls';
        } else if (str_contains($name, 'новорожденн') || str_contains($name, 'baby') || str_contains($slug, 'baby')) {
            return 'babies';
        } else {
            return '';
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_type' => 'required|string|in:boys,girls,babies',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Добавляем префикс к названию и slug в зависимости от типа, если это корневая категория
        if (empty($data['parent_id'])) {
            $prefixData = $this->getCategoryPrefix($data['category_type']);
            
            // Обновляем название только если в нем еще нет префикса
            if (!str_contains(strtolower($data['name']), $prefixData['name_prefix'])) {
                $data['name'] = $prefixData['name_full'] . ' ' . $data['name'];
            }
            
            // Обновляем slug только если в нем еще нет префикса
            if (!str_contains($data['slug'], $prefixData['slug_prefix'])) {
                $data['slug'] = $prefixData['slug_prefix'] . '-' . $data['slug'];
            }
        }
        
        // Удаляем поле типа категории, так как оно не нужно для сохранения
        unset($data['category_type']);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Категория успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Категория успешно удалена');
    }
}
