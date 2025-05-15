@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Мои заказы</h1>
            <p class="text-muted">История ваших заказов</p>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
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
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">История заказов</h5>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>№ заказа</th>
                                        <th>Дата</th>
                                        <th>Сумма</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                            <td>{{ number_format($order->total, 0, '.', ' ') }} ₽</td>
                                            <td>
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
                                            </td>
                                            <td>
                                                <a href="{{ route('account.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye mr-1"></i>Подробнее
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                            <h4>У вас пока нет заказов</h4>
                            <p class="text-muted">Перейдите в каталог, чтобы сделать первый заказ</p>
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart mr-2"></i>Перейти к покупкам
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 