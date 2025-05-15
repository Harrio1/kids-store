<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Конструктор контроллера
     */
    public function __construct()
    {
        // Создаем директорию для хранения изображений продуктов, если её нет
        if (!Storage::disk('public')->exists('products')) {
            Storage::disk('public')->makeDirectory('products');
        }
    }

    // Отображение списка товаров для посетителей
    public function index()
    {
        // Получаем корневые категории для отображения на главной странице
        $mainCategories = \App\Models\Category::whereNull('parent_id')
                                           ->where('is_active', true)
                                           ->orderBy('sort_order')
                                           ->take(6)
                                           ->get();
        
        // Получаем рекомендуемые товары
        $featuredProducts = Product::where('is_featured', true)
                                 ->where('is_active', true)
                                 ->latest()
                                 ->take(8)
                                 ->get();
        
        // Получаем новые товары
        $newProducts = Product::where('is_active', true)
                            ->latest()
                            ->take(8)
                            ->get();
        
        // Получаем все товары для обратной совместимости
        $products = Product::all();
        
        return view('products.index', compact('mainCategories', 'featuredProducts', 'newProducts', 'products'));
    }

    // Отображение детальной страницы товара
    public function show(Product $product)
    {
        // Получаем похожие товары той же категории (максимум 4)
        $relatedProducts = Product::where('category', $product->category)
                              ->where('id', '!=', $product->id)
                              ->inRandomOrder()
                              ->take(4)
                              ->get();
                              
        return view('products.show', compact('product', 'relatedProducts'));
    }

    // Отображение списка товаров для админа
    public function adminIndex()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Форма для создания нового товара
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Сохранение нового товара
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'required|string|in:boys,girls,newborns',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sku' => 'nullable|string|unique:products',
            'stock' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        
        // Обработка галереи изображений
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
            $data['gallery'] = $galleryPaths;
        }

        Product::create($data);
        
        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно добавлен.');
    }

    // Форма для редактирования товара
    public function edit(Product $product)
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Обновление товара
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'required|string|in:boys,girls,newborns',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
            'stock' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->all();
        
        // Обработка загрузки изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }
        
        // Обработка галереи изображений
        if ($request->hasFile('gallery')) {
            // Удаляем старые изображения галереи, если они есть
            if ($product->gallery) {
                foreach ($product->gallery as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
            
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('products/gallery', 'public');
            }
            $data['gallery'] = $galleryPaths;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно обновлён.');
    }

    // Удаление товара
    public function destroy(Product $product)
    {
        // Удаляем изображение, если оно есть
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно удалён.');
    }
    
    // Отображение страницы для мальчиков
    public function boys()
    {
        // Фильтрация по категории "для мальчиков"
        $products = Product::where('category', 'boys')->paginate(12);
        return view('boys.boys', compact('products'));
    }
    
    // Отображение страницы для девочек
    public function girls()
    {
        // Фильтрация по категории "для девочек"
        $products = Product::where('category', 'girls')->paginate(12);
        return view('girls.girls', compact('products'));
    }
    
    // Отображение страницы для новорожденных
    public function newborns()
    {
        // Фильтрация по категории "для новорожденных"
        $products = Product::where('category', 'newborns')->paginate(12);
        return view('kids.newborns', compact('products'));
    }
}
