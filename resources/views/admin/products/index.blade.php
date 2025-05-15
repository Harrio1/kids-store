@extends('layouts.app')

@section('content')
<!-- Встроенные стили для бейджей, которые имеют самый высокий приоритет -->
<style>
    /* Стили для всех бейджей в таблице */
    table .badge {
        display: inline-block !important;
        padding: 0.4em 0.6em !important;
        font-size: 85% !important;
        font-weight: 700 !important;
        line-height: 1 !important;
        text-align: center !important;
        white-space: nowrap !important;
        vertical-align: baseline !important;
        border-radius: 0.25rem !important;
        pointer-events: none !important;
        position: relative !important;
        z-index: 100 !important;
    }
    
    /* Стили для разных типов бейджей */
    table .badge-primary {
        background-color: #007bff !important;
        color: #ffffff !important;
        border: 1px solid #0062cc !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important;
    }
    
    table .badge-danger {
        background-color: #dc3545 !important;
        color: #ffffff !important;
        border: 1px solid #bd2130 !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important;
    }
    
    table .badge-success {
        background-color: #28a745 !important;
        color: #ffffff !important;
        border: 1px solid #1e7e34 !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important;
    }
    
    /* Стили при наведении на строку таблицы */
    table tr:hover .badge-primary, 
    table tr:hover .badge-danger, 
    table tr:hover .badge-success,
    table tr:hover .badge-info,
    table tr:hover .badge-secondary {
        color: #ffffff !important;
    }
    
    /* Специфичные стили для темной темы */
    [data-theme="dark"] table .badge-primary {
        background-color: #007bff !important;
        color: #ffffff !important;
    }
    
    [data-theme="dark"] table .badge-danger {
        background-color: #dc3545 !important;
        color: #ffffff !important;
    }
    
    [data-theme="dark"] table .badge-success {
        background-color: #28a745 !important;
        color: #ffffff !important;
    }
    
    /* Стили при наведении на строку таблицы в темной теме */
    [data-theme="dark"] table tr:hover .badge-primary,
    [data-theme="dark"] table tr:hover .badge-danger,
    [data-theme="dark"] table tr:hover .badge-success,
    [data-theme="dark"] table tr:hover .badge-info,
    [data-theme="dark"] table tr:hover .badge-secondary {
        color: #ffffff !important;
    }
</style>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Управление товарами</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">Добавить новый товар</a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 50px; max-height: 50px;">
                                    @else
                                        <span class="text-muted">Нет изображения</span>
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if($product->category == 'boys')
                                        <span class="badge badge-primary" title="Для мальчиков" style="background-color: #007bff !important; color: #ffffff !important; font-weight: 700 !important; text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important; pointer-events: none !important;">Для мальчиков</span>
                                    @elseif($product->category == 'girls')
                                        <span class="badge badge-danger" title="Для девочек" style="background-color: #dc3545 !important; color: #ffffff !important; font-weight: 700 !important; text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important; pointer-events: none !important;">Для девочек</span>
                                    @elseif($product->category == 'newborns')
                                        <span class="badge badge-success" title="Для новорожденных" style="background-color: #28a745 !important; color: #ffffff !important; font-weight: 700 !important; text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important; pointer-events: none !important;">Для новорожденных</span>
                                    @else
                                        <span class="badge badge-secondary" title="Категория не указана" style="background-color: #6c757d !important; color: #ffffff !important; font-weight: 700 !important; text-shadow: 1px 1px 2px rgba(0,0,0,0.3) !important; pointer-events: none !important;">Не указана</span>
                                    @endif
                                </td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>{{ number_format($product->price, 0, '.', ' ') }} ₽</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Товары не найдены</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 