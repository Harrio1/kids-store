@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Заказ #{{ $order->id }}</h1>
            <p class="text-muted">Дата заказа: {{ $order->created_at->format('d.m.Y H:i') }}</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('account.orders') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Вернуться к списку заказов
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="list-group">
                <a href="{{ route('account.dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-tachometer-alt mr-2"></i>Панель управления
                </a>
                <a href="{{ route('account.orders') }}" class="list-group-item list-group-item-action active">
                    <i class="fas fa-shopping-bag mr-2"></i>Мои заказы
                </a>
                <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-circle mr-2"></i>Мой профиль
                </a>
                <a href="{{ route('logout') }}" 
                   class="list-group-item list-group-item-action text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i>Выйти
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Информация о заказе</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Статус заказа</h6>
                                    @if($order->status === 'new')
                                        <span class="badge badge-secondary">Новый</span>
                                    @elseif($order->status === 'processing')
                                        <span class="badge badge-primary">В обработке</span>
                                    @elseif($order->status === 'shipped')
                                        <span class="badge badge-info">Отправлен</span>
                                    @elseif($order->status === 'delivered')
                                        <span class="badge badge-success">Доставлен</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge badge-danger">Отменен</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $order->status }}</span>
                                    @endif
                                    
                                    <h6 class="mt-3">Способ оплаты</h6>
                                    <p>
                                        @if($order->payment_method === 'cash')
                                            Наличными при получении
                                        @elseif($order->payment_method === 'card')
                                            Картой при получении
                                        @else
                                            {{ $order->payment_method }}
                                        @endif
                                    </p>
                                    
                                    <h6 class="mt-3">Общая сумма</h6>
                                    <p class="text-primary font-weight-bold">{{ number_format($order->total, 0, '.', ' ') }} ₽</p>
                                </div>
                                
                                <div class="col-md-6">
                                    <h6>Данные покупателя</h6>
                                    <p>{{ $order->name }}</p>
                                    <p>{{ $order->email }}</p>
                                    <p>{{ $order->phone }}</p>
                                    
                                    <h6 class="mt-3">Адрес доставки</h6>
                                    <p>{{ $order->address }}</p>
                                    <p>{{ $order->city }}, {{ $order->postal_code }}</p>
                                </div>
                            </div>
                            
                            @if($order->notes)
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h6>Комментарий к заказу</h6>
                                        <p>{{ $order->notes }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Товары в заказе</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Товар</th>
                                            <th>Размер</th>
                                            <th>Цена</th>
                                            <th>Количество</th>
                                            <th>Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->size }} см</td>
                                                <td>{{ number_format($item->price, 0, '.', ' ') }} ₽</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->price * $item->quantity, 0, '.', ' ') }} ₽</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" class="text-right">Итого:</th>
                                            <th>{{ number_format($order->total, 0, '.', ' ') }} ₽</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 