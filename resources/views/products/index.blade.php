@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Hero Banner -->
    <div class="hero-banner mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center p-5">
                        <h1>Детская одежда высокого качества</h1>
                        <p class="lead">Коллекции для мальчиков, девочек и новорожденных</p>
                        <a href="#categories" class="btn btn-primary btn-lg">Смотреть каталог</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Categories Section -->
    <section id="categories" class="mb-5">
        <h2 class="section-title mb-4">Каталог</h2>
    <div class="row">
            @if(isset($mainCategories) && count($mainCategories) > 0)
                @foreach($mainCategories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card category-card h-100">
                            <a href="{{ route('category.view', $category->slug) }}">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                                @else
                                    <div class="card-img-top bg-light text-center py-5">
                                        <i class="fas fa-folder-open fa-4x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body text-center">
                                    <h3 class="card-title">{{ $category->name }}</h3>
                                    @if($category->description)
                                        <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Legacy Categories -->
                <div class="col-md-4 mb-4">
                    <div class="card category-card h-100">
                        <a href="{{ route('boys') }}">
                            <div class="card-img-top bg-primary text-center py-5">
                                <i class="fas fa-child fa-4x text-white"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">Для мальчиков</h3>
                                <p class="card-text">Коллекция одежды для мальчиков разных возрастов</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card category-card h-100">
                        <a href="{{ route('girls') }}">
                            <div class="card-img-top bg-danger text-center py-5">
                                <i class="fas fa-child fa-4x text-white"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">Для девочек</h3>
                                <p class="card-text">Коллекция одежды для девочек разных возрастов</p>
                            </div>
                        </a>
                    </div>
                </div>
                
            <div class="col-md-4 mb-4">
                    <div class="card category-card h-100">
                        <a href="{{ route('newborns') }}">
                            <div class="card-img-top bg-success text-center py-5">
                                <i class="fas fa-baby fa-4x text-white"></i>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title">Для новорожденных</h3>
                                <p class="card-text">Коллекция одежды и аксессуаров для самых маленьких</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
    
    <!-- Featured Products Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Рекомендуемые товары</h2>
            <a href="#" class="btn btn-outline-primary">Смотреть все</a>
        </div>
        
        <div class="row">
            @foreach($featuredProducts as $product)
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
    </section>
    
    <!-- New Arrivals Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Новинки</h2>
            <a href="#" class="btn btn-outline-primary">Смотреть все</a>
        </div>
        
        <div class="row">
            @foreach($newProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card h-100">
                        <div class="new-badge">Новинка</div>
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
    </section>
</div>
@endsection

@section('styles')
<style>
    .hero-banner {
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    .section-title {
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 2px;
        background-color: #007bff;
    }
    
    .category-card {
        transition: transform 0.3s, box-shadow 0.3s;
        border-radius: 5px;
        overflow: hidden;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .category-card a {
        text-decoration: none;
        color: inherit;
    }
    
    .product-card {
        position: relative;
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
        z-index: 2;
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
 