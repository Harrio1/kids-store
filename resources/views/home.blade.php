@extends('layouts.app')

@section('content')
    <div class="product-grid">
        <div class="product-item">
            <img src="{{ asset('images/product1.jpg') }}" alt="Одежда из флиса">
            <h3>Одежда из флиса</h3>
        </div>
        <div class="product-item">
            <img src="{{ asset('images/product2.jpg') }}" alt="Куртки">
            <h3>Куртки</h3>
        </div>
        <div class="product-item">
            <img src="{{ asset('images/product3.jpg') }}" alt="Комбинезоны">
            <h3>Комбинезоны</h3>
        </div>
    </div>
@endsection