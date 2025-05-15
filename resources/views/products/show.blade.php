@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light py-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            @if($product->category == 'boys')
                <li class="breadcrumb-item"><a href="{{ route('boys') }}">Для мальчиков</a></li>
            @elseif($product->category == 'girls')
                <li class="breadcrumb-item"><a href="{{ route('girls') }}">Для девочек</a></li>
            @elseif($product->category == 'newborns')
                <li class="breadcrumb-item"><a href="{{ route('newborns') }}">Для новорожденных</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-6">
            <div class="product-gallery">
                <div class="main-image mb-3 position-relative">
                    @if($product->isOnSale())
                        <div class="sale-badge">-{{ $product->getDiscountPercentage() }}%</div>
                    @endif
                    @if($product->created_at >= now()->subDays(7))
                        <div class="new-badge">Новинка</div>
                    @endif
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow-sm" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded shadow-sm" alt="Нет изображения">
                    @endif
                </div>
                
                <!-- Можно добавить дополнительные миниатюры, если у товара несколько фото -->
                <div class="thumbnails d-flex">
                    <!-- Здесь будут дополнительные изображения -->
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="product-info pl-lg-4">
                <h1 class="mb-3">{{ $product->name }}</h1>
                
                <div class="product-meta mb-3">
                    <div class="badge badge-pill 
                        @if($product->category == 'boys')
                            badge-primary
                        @elseif($product->category == 'girls')
                            badge-danger
                        @elseif($product->category == 'newborns')
                            badge-success
                        @endif
                        mb-2">
                        @if($product->category == 'boys')
                            Для мальчиков
                        @elseif($product->category == 'girls')
                            Для девочек
                        @elseif($product->category == 'newborns')
                            Для новорожденных
                        @endif
                    </div>
                    
                    <div class="product-sku mb-2">
                        <small class="text-muted">Артикул: {{ $product->id }}</small>
                    </div>
                </div>
                
                <div class="product-price mb-4">
                    @if($product->isOnSale())
                        <div class="d-flex align-items-center">
                            <h3 class="discount-price mr-3">{{ number_format($product->sale_price, 0, '.', ' ') }} ₽</h3>
                            <span class="old-price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                            <span class="discount-percent ml-3 badge badge-pill badge-danger">
                                Скидка {{ $product->getDiscountPercentage() }}%
                            </span>
                        </div>
                        <div class="saving-amount text-success mb-2">
                            <small>Вы экономите: {{ number_format($product->price - $product->sale_price, 0, '.', ' ') }} ₽</small>
                        </div>
                    @else
                        <h3 class="text-primary font-weight-bold">{{ number_format($product->price, 0, '.', ' ') }} ₽</h3>
                    @endif
                </div>
                
                <div class="product-description mb-4">
                    <h5>Описание</h5>
                    <p>{{ $product->description }}</p>
                </div>
                
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group row align-items-center">
                        <label for="size" class="col-sm-3 col-form-label">Размер</label>
                        <div class="col-sm-9">
                            <div class="btn-group-toggle size-selector" data-toggle="buttons">
                                @foreach([62, 68, 74, 80, 86, 92, 98, 104, 110, 116, 122, 128, 134, 140, 146, 152, 158, 164] as $size)
                                <label class="btn btn-outline-secondary mr-2 mb-2">
                                    <input type="radio" name="size" value="{{ $size }}" autocomplete="off" required> {{ $size }} см
                                </label>
                                @endforeach
                            </div>
                            <small class="form-text text-muted mt-2">
                                <i class="fas fa-info-circle"></i> Выберите размер, соответствующий росту ребенка
                            </small>
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label for="quantity" class="col-sm-3 col-form-label">Количество</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary quantity-minus">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1" min="1" max="10">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary quantity-plus">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-shopping-cart mr-2"></i>Добавить в корзину
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="product-delivery-info p-3 bg-light rounded">
                    <div class="mb-2">
                        <i class="fas fa-truck text-primary mr-2"></i>
                        <span>Доставка по всей России</span>
                    </div>
                    <div class="mb-2">
                        <i class="fas fa-shield-alt text-primary mr-2"></i>
                        <span>Гарантия качества</span>
                    </div>
                    <div>
                        <i class="fas fa-undo text-primary mr-2"></i>
                        <span>Возврат в течение 14 дней</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="related-products mt-5">
        <h3 class="mb-4">Рекомендуемые товары</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-3 mb-4">
                    <div class="product-card">
                        <div class="product-img">
                            @if($relatedProduct->isOnSale())
                                <div class="sale-badge">-{{ $relatedProduct->getDiscountPercentage() }}%</div>
                            @endif
                            @if($relatedProduct->image)
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}">
                            @else
                                <img src="{{ asset('img/no-image.png') }}" alt="Нет изображения">
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-title">{{ $relatedProduct->name }}</div>
                            <div class="product-price mb-2">
                                @if($relatedProduct->isOnSale())
                                    <span class="old-price">{{ number_format($relatedProduct->price, 0, '.', ' ') }} ₽</span>
                                    <span class="discount-price">{{ number_format($relatedProduct->sale_price, 0, '.', ' ') }} ₽</span>
                                @else
                                    <span>{{ number_format($relatedProduct->price, 0, '.', ' ') }} ₽</span>
                                @endif
                            </div>
                            <a href="{{ route('products.show', $relatedProduct->id) }}" class="btn btn-sm btn-primary">Подробнее</a>
                            <form action="{{ route('cart.add', $relatedProduct->id) }}" method="POST" class="d-inline">
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
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Обработчики кнопок плюс и минус для количества
    document.querySelector('.quantity-minus').addEventListener('click', function() {
        var input = document.getElementById('quantity');
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    });
    
    document.querySelector('.quantity-plus').addEventListener('click', function() {
        var input = document.getElementById('quantity');
        var value = parseInt(input.value);
        if (value < 10) {
            input.value = value + 1;
        }
    });
    
    // Выбор первого размера по умолчанию
    if (document.querySelector('.size-selector label')) {
        document.querySelector('.size-selector label').classList.add('active');
        document.querySelector('.size-selector input').checked = true;
    }
});
</script>
@endsection 