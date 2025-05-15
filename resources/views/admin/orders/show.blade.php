@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Заказ #{{ $order->id }}</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Назад к списку заказов</a>
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
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Информация о заказе</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Статус заказа:</div>
                        <div class="col-md-8">
                            @if($order->status == \App\Models\Order::STATUS_NEW)
                                <span class="badge badge-info">Новый</span>
                            @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                                <span class="badge badge-warning">В обработке</span>
                            @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                                <span class="badge badge-success">Выполнен</span>
                            @elseif($order->status == \App\Models\Order::STATUS_CANCELLED)
                                <span class="badge badge-danger">Отменен</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Дата создания:</div>
                        <div class="col-md-8">{{ $order->created_at->format('d.m.Y H:i') }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Сумма заказа:</div>
                        <div class="col-md-8">{{ number_format($order->total, 0, '.', ' ') }} ₽</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Способ оплаты:</div>
                        <div class="col-md-8">
                            {{ $order->payment_method == 'cash' ? 'Наличными при получении' : 'Картой при получении' }}
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="status">Изменить статус заказа</label>
                            <select name="status" id="status" class="form-control">
                                @foreach(\App\Models\Order::getStatusList() as $key => $value)
                                    <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить статус</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Информация о клиенте</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Имя:</div>
                        <div class="col-md-8">{{ $order->name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Email:</div>
                        <div class="col-md-8">{{ $order->email }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Телефон:</div>
                        <div class="col-md-8">{{ $order->phone }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Адрес:</div>
                        <div class="col-md-8">{{ $order->address }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Город:</div>
                        <div class="col-md-8">{{ $order->city }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4 font-weight-bold">Индекс:</div>
                        <div class="col-md-8">{{ $order->postal_code }}</div>
                    </div>
                    @if($order->notes)
                        <div class="row mb-2">
                            <div class="col-md-4 font-weight-bold">Примечания:</div>
                            <div class="col-md-8">{{ $order->notes }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Товары в заказе</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Размер</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ number_format($item->price, 0, '.', ' ') }} ₽</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, '.', ' ') }} ₽</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Итого:</strong></td>
                            <td><strong>{{ number_format($order->total, 0, '.', ' ') }} ₽</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 