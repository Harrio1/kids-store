@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Личный кабинет</h1>
            <p class="text-muted">Добро пожаловать, {{ Auth::user()->name }}!</p>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="list-group">
                <a href="{{ route('account.dashboard') }}" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt mr-2"></i>Панель управления
                </a>
                <a href="{{ route('account.orders') }}" class="list-group-item list-group-item-action">
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
                    <h5 class="mb-0">Панель управления</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-shopping-bag fa-3x text-primary mb-3"></i>
                                    <h5 class="card-title">Мои заказы</h5>
                                    <p class="card-text">Просмотр истории заказов и их статусов</p>
                                    <a href="{{ route('account.orders') }}" class="btn btn-outline-primary">Перейти к заказам</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-edit fa-3x text-success mb-3"></i>
                                    <h5 class="card-title">Мой профиль</h5>
                                    <p class="card-text">Редактирование личных данных и пароля</p>
                                    <a href="{{ route('account.profile') }}" class="btn btn-outline-success">Редактировать профиль</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 