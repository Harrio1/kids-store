@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light py-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Для мальчиков</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Категории</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Все категории
                        <span class="badge badge-primary badge-pill">{{ count($products) }}</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Зимняя одежда
                        <span class="badge badge-primary badge-pill">12</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Весенняя одежда
                        <span class="badge badge-primary badge-pill">8</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Повседневная одежда
                        <span class="badge badge-primary badge-pill">15</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Футболки
                        <span class="badge badge-primary badge-pill">7</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Брюки
                        <span class="badge badge-primary badge-pill">6</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Комбинезоны
                        <span class="badge badge-primary badge-pill">4</span>
                    </a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Фильтр</h5>
                </div>
                <div class="card-body">
                    <h6 class="mb-3">Цена</h6>
                    <div class="form-row">
                        <div class="col">
                            <input type="number" class="form-control" placeholder="От">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="До">
                        </div>
                    </div>
                    
                    <h6 class="mb-3 mt-4">Размер</h6>
                    <div class="btn-group-toggle" data-toggle="buttons">
                        @foreach([62, 68, 74, 80, 86, 92, 98, 104, 110, 116, 122, 128] as $size)
                        <label class="btn btn-outline-secondary btn-sm mr-2 mb-2">
                            <input type="checkbox" autocomplete="off"> {{ $size }}
                        </label>
                        @endforeach
                    </div>
                    
                    <button class="btn btn-primary btn-block mt-4">Применить</button>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">Одежда для мальчиков</h1>
                <div class="form-inline">
                    <label class="mr-2">Сортировать:</label>
                    <select class="form-control">
                        <option>По популярности</option>
                        <option>Сначала дешевые</option>
                        <option>Сначала дорогие</option>
                        <option>По названию (А-Я)</option>
                    </select>
                </div>
            </div>

            <div class="banner mb-4">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h4 class="mb-2">Скидка 15% на всю коллекцию для мальчиков</h4>
                        <p class="mb-0">Используйте промокод BOYS2025 при оформлении заказа</p>
                    </div>
                    <div class="col-md-3 text-right">
                        <button class="btn btn-light">Подробнее</button>
                    </div>
                </div>
            </div>

            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                <div class="product-img">
                                    @if($product->isOnSale())
                                        <div class="sale-badge">-{{ $product->getDiscountPercentage() }}%</div>
                                    @endif
                                    @if($product->created_at >= now()->subDays(7))
                                        <div class="new-badge">Новинка</div>
                                    @endif
                                    <a href="{{ route('products.show', $product->id) }}">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('img/no-image.png') }}" alt="Нет изображения">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="{{ route('products.show', $product->id) }}" class="text-dark text-decoration-none">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                    <div class="product-price mb-2">
                                        @if($product->isOnSale())
                                            <span class="old-price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                                            <span class="discount-price">{{ number_format($product->sale_price, 0, '.', ' ') }} ₽</span>
                                        @else
                                            <span>{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">Подробнее</a>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="size" value="80">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">
                            Товары для мальчиков не найдены.
                        </div>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() ?? '' }}
            </div>
        </div>
    </div>
</div>
@endsection
