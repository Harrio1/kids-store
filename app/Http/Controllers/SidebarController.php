<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;

class SidebarController extends Controller
{
    /**
     * Получает категории для боковой панели и делит их на три группы
     */
    public function getCategories()
    {
        // Для мальчиков - категории, где имя/slug содержит "мальчик" или "boy"
        $boyCategories = $this->getCategoriesByType('мальчик|boy');
        
        // Для девочек - категории, где имя/slug содержит "девочк" или "girl"
        $girlCategories = $this->getCategoriesByType('девочк|girl');
        
        // Для новорожденных - категории, где имя/slug содержит "новорожденн" или "baby"
        $babyCategories = $this->getCategoriesByType('новорожденн|baby');
        
        // Добавляем переменные во все представления
        View::share('boyCategories', $boyCategories);
        View::share('girlCategories', $girlCategories);
        View::share('babyCategories', $babyCategories);
    }
    
    /**
     * Получает категории по типу (для мальчиков, для девочек, для новорожденных)
     */
    private function getCategoriesByType(string $pattern): array
    {
        // Получаем корневые категории по типу
        $rootCategories = Category::with(['children' => function ($query) {
                $query->where('is_active', true)
                    ->withCount('products');
            }])
            ->where('is_active', true)
            ->where(function (Builder $query) use ($pattern) {
                $query->where('name', 'REGEXP', $pattern)
                    ->orWhere('slug', 'REGEXP', $pattern);
            })
            ->withCount('products')
            ->orderBy('sort_order')
            ->get();
        
        return $rootCategories->toArray();
    }
} 