@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-3">Панель администратора</h1>
            <p class="text-muted">Добро пожаловать в панель управления интернет-магазином!</p>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Пользователи</h5>
                            <p class="display-4 mb-0">{{ $userCount }}</p>
                        </div>
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <a href="{{ route('admin.users') }}" class="btn btn-light mt-3">Управление пользователями</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Товары</h5>
                            <p class="display-4 mb-0">{{ $productCount }}</p>
                        </div>
                        <i class="fas fa-tshirt fa-3x"></i>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light mt-3">Управление товарами</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0">Категории</h5>
                            <p class="display-4 mb-0">{{ $categoryCount }}</p>
                        </div>
                        <i class="fas fa-tags fa-3x"></i>
                    </div>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light mt-3">Управление категориями</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <h2>Быстрые действия</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-plus-circle fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Добавить товар</h5>
                    <p class="card-text">Создание нового товара в каталоге</p>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary">Добавить</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-folder-plus fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Добавить категорию</h5>
                    <p class="card-text">Создание новой категории товаров</p>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success">Добавить</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Заказы</h5>
                    <p class="card-text">Просмотр и управление заказами</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-info">Перейти</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-shield fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Управление ролями</h5>
                    <p class="card-text">Назначение ролей пользователям</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-danger">Управлять</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 