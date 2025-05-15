@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fa fa-check-circle text-success" style="font-size: 60px;"></i>
                    </div>
                    <h2 class="mb-3">Заказ успешно оформлен!</h2>
                    <p class="mb-3">Спасибо за покупку в нашем магазине. Ваш заказ #{{ $order->id }} принят в обработку.</p>
                    <p class="mb-4">Мы отправили подтверждение на ваш email: <strong>{{ $order->email }}</strong></p>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Информация о заказе</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <p><strong>Имя:</strong> {{ $order->name }}</p>
                                    <p><strong>Email:</strong> {{ $order->email }}</p>
                                    <p><strong>Телефон:</strong> {{ $order->phone }}</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <p><strong>Адрес:</strong> {{ $order->address }}</p>
                                    <p><strong>Город:</strong> {{ $order->city }}</p>
                                    <p><strong>Индекс:</strong> {{ $order->postal_code }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Способ оплаты:</strong> 
                                        {{ $order->payment_method == 'cash' ? 'Наличными при получении' : 'Картой при получении' }}
                                    </p>
                                    <p><strong>Сумма заказа:</strong> {{ number_format($order->total, 0, '.', ' ') }} ₽</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('home') }}" class="btn btn-primary">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 