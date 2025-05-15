@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            @if($category->parent)
                <li class="breadcrumb-item"><a href="{{ route('category.view', $category->parent->slug) }}">{{ $category->parent->name }}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>

    <div class="category-header mb-4">
        <h1>{{ $category->name }}</h1>
        @if($category->description)
            <div class="category-description">
                {{ $category->description }}
            </div>
        @endif
    </div>

    <!-- Подкатегории, если есть -->
    @if(count($subcategories) > 0)
        <div class="subcategories-section mb-5">
            <h2 class="mb-3">Подкатегории</h2>
            <div class="row">
                @foreach($subcategories as $subcategory)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('category.view', $subcategory->slug) }}">
                                @if($subcategory->image)
                                    <img src="{{ asset('storage/' . $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->name }}">
                                @else
                                    <div class="card-img-top bg-light text-center py-4">
                                        <i class="fas fa-folder-open fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $subcategory->name }}</h5>
                                    @if($subcategory->description)
                                        <p class="card-text">{{ Str::limit($subcategory->description, 100) }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Товары этой категории -->
    <div class="products-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Товары в категории</h2>
            
            <!-- Фильтры и сортировка (можно расширить) -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сортировать
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">По цене (дешевле)</a>
                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">По цене (дороже)</a>
                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'new']) }}">Сначала новые</a>
                </div>
            </div>
        </div>

        @if(count($products) > 0)
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card product-card h-100">
                            <a href="{{ route('products.show', $product->id) }}">
                                @if($product->isOnSale())
                                    <div class="sale-badge">-{{ $product->getDiscountPercentage() }}%</div>
                                @endif
                                
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                @else
                                    <div class="card-img-top bg-light text-center py-4">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </a>
                            
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </h5>
                                
                                <div class="card-text mb-2">
                                    @if($product->isOnSale())
                                        <span class="old-price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                                        <span class="new-price">{{ number_format($product->sale_price, 0, '.', ' ') }} ₽</span>
                                    @else
                                        <span class="price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                                    @endif
                                </div>
                                
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">В корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="pagination-container mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-info">
                В этой категории пока нет товаров.
            </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
    .product-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .sale-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff4e50;
        color: white;
        padding: 5px 10px;
        border-radius: 3px;
        font-weight: bold;
        font-size: 0.8rem;
    }
    
    .old-price {
        text-decoration: line-through;
        color: #999;
        margin-right: 5px;
    }
    
    .new-price {
        color: #ff4e50;
        font-weight: bold;
    }
    
    .price {
        font-weight: bold;
    }
</style>
@endsection 