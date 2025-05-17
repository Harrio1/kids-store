<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the product observer
        Product::observe(ProductObserver::class);

        // Проверяем, не делаем ли мы консольную команду
        if (!$this->app->runningInConsole()) {
            // Загружаем категории для боковой панели
            $this->loadCategories();
        }
    }

    /**
     * Загружает категории для боковой панели
     */
    private function loadCategories(): void
    {
        try {
            // Загружаем данные только если таблица существует
            if (Schema::hasTable('categories')) {
                // Для мальчиков
                $boyCategories = Category::with(['children' => function ($query) {
                        $query->where('is_active', true)
                            ->withCount('products');
                    }])
                    ->where('is_active', true)
                    ->where(function ($query) {
                        $query->where('name', 'like', '%мальчик%')
                            ->orWhere('name', 'like', '%boy%')
                            ->orWhere('slug', 'like', '%boy%');
                    })
                    ->withCount('products')
                    ->orderBy('sort_order')
                    ->get();
                
                // Для девочек
                $girlCategories = Category::with(['children' => function ($query) {
                        $query->where('is_active', true)
                            ->withCount('products');
                    }])
                    ->where('is_active', true)
                    ->where(function ($query) {
                        $query->where('name', 'like', '%девочк%')
                            ->orWhere('name', 'like', '%girl%')
                            ->orWhere('slug', 'like', '%girl%');
                    })
                    ->withCount('products')
                    ->orderBy('sort_order')
                    ->get();
                
                // Для новорожденных
                $babyCategories = Category::with(['children' => function ($query) {
                        $query->where('is_active', true)
                            ->withCount('products');
                    }])
                    ->where('is_active', true)
                    ->where(function ($query) {
                        $query->where('name', 'like', '%новорожденн%')
                            ->orWhere('name', 'like', '%baby%')
                            ->orWhere('slug', 'like', '%baby%');
                    })
                    ->withCount('products')
                    ->orderBy('sort_order')
                    ->get();
                
                // Делимся переменными со всеми представлениями
                View::share('boyCategories', $boyCategories);
                View::share('girlCategories', $girlCategories);
                View::share('babyCategories', $babyCategories);
            }
        } catch (\Exception $e) {
            // Если что-то пошло не так, логируем ошибку и продолжаем
            Log::error('Ошибка при загрузке категорий: ' . $e->getMessage());
        }
    }
}
