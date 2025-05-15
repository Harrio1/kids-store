@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Оформление заказа</h1>
    
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Данные для доставки</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">ФИО <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Телефон <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Адрес <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">Город <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="postal_code">Почтовый индекс <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="payment_method">Способ оплаты <span class="text-danger">*</span></label>
                            <select class="form-control @error('payment_method') is-invalid @enderror" id="payment_method" name="payment_method" required>
                                <option value="">Выберите способ оплаты</option>
                                <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Наличными при получении</option>
                                <option value="card" {{ old('payment_method') == 'card' ? 'selected' : '' }}>Картой при получении</option>
                            </select>
                            @error('payment_method')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="notes">Примечания к заказу</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Ваш заказ</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Товар</th>
                                <th>Размер</th>
                                <th>Кол-во</th>
                                <th class="text-right">Сумма</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $cartKey => $details)
                                <tr>
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ $details['size'] }}</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td class="text-right">{{ number_format($details['price'] * $details['quantity'], 0, '.', ' ') }} ₽</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Итого:</strong></td>
                                <td class="text-right"><strong>{{ number_format($total, 0, '.', ' ') }} ₽</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="submit" form="checkout-form" class="btn btn-success btn-block">Подтвердить заказ</button>
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary btn-block mt-2">Вернуться в корзину</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 