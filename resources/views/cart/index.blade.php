@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light py-2">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
        </ol>
    </nav>

    <h1 class="mb-4">Корзина</h1>
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (count($cart) > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3 border-0">Товар</th>
                                        <th class="py-3 border-0">Размер</th>
                                        <th class="py-3 border-0 text-center">Цена</th>
                                        <th class="py-3 border-0 text-center">Количество</th>
                                        <th class="py-3 border-0 text-center">Сумма</th>
                                        <th class="py-3 border-0 text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $cartKey => $details)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    @if(isset($details['image']) && $details['image'])
                                                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-thumbnail mr-3" style="width: 70px; height: 70px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('img/no-image.png') }}" alt="Нет изображения" class="img-thumbnail mr-3" style="width: 70px; height: 70px; object-fit: cover;">
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-0">{{ $details['name'] }}</h6>
                                                        <small class="text-muted">Артикул: {{ $details['product_id'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                {{ $details['size'] }} см
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ number_format($details['price'], 0, '.', ' ') }} ₽
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('cart.update') }}" method="POST" class="cart-update-form">
                                                    @csrf
                                                    <div class="input-group input-group-sm quantity-selector" style="width: 120px;">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary quantity-minus">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="number" name="items[{{ $cartKey }}]" value="{{ $details['quantity'] }}" min="1" max="10" class="form-control text-center quantity-input">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-secondary quantity-plus">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="align-middle text-center">
                                                <strong>{{ number_format($details['price'] * $details['quantity'], 0, '.', ' ') }} ₽</strong>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('cart.remove', $cartKey) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы уверены?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left mr-2"></i>Продолжить покупки
                        </a>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger mr-2" onclick="return confirm('Вы уверены, что хотите очистить корзину?')">
                                    <i class="fas fa-trash-alt mr-1"></i>Очистить корзину
                                </button>
                            </form>
                            <button type="button" class="btn btn-primary" onclick="updateCart()">
                                <i class="fas fa-sync-alt mr-1"></i>Обновить корзину
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Сумма заказа</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Товары ({{ count($cart) }}):</span>
                            <span>{{ number_format($total, 0, '.', ' ') }} ₽</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Скидка:</span>
                            <span class="text-success">0 ₽</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Итого к оплате:</strong>
                            <strong class="text-primary">{{ number_format($total, 0, '.', ' ') }} ₽</strong>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-success btn-block">
                            <i class="fas fa-check mr-2"></i>Оформить заказ
                        </a>
                    </div>
                </div>
                
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Есть промокод?</h5>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Введите промокод">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">Применить</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="fas fa-truck text-primary mr-2"></i>
                            <span>Бесплатная доставка от 5000 ₽</span>
                        </div>
                        <div class="mb-3">
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
    @else
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <i class="fas fa-shopping-cart text-muted mb-3" style="font-size: 4rem;"></i>
                <h3 class="mb-3">Ваша корзина пуста</h3>
                <p class="text-muted mb-4">Добавьте товары в корзину, чтобы оформить заказ</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-arrow-left mr-2"></i>Перейти к покупкам
                </a>
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Обработчики кнопок плюс и минус для количества
    document.querySelectorAll('.quantity-minus').forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.closest('.quantity-selector').querySelector('.quantity-input');
            var value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
    });
    
    document.querySelectorAll('.quantity-plus').forEach(function(button) {
        button.addEventListener('click', function() {
            var input = this.closest('.quantity-selector').querySelector('.quantity-input');
            var value = parseInt(input.value);
            if (value < 10) {
                input.value = value + 1;
            }
        });
    });
});

function updateCart() {
    document.querySelectorAll('.cart-update-form').forEach(function(form) {
        form.submit();
    });
}
</script>
@endsection 