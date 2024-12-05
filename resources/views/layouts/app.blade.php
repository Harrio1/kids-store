<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Солнышко - Витрина детского магазина</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

</head>
<body class="background">
     @include('layouts.navbar')
     @include('layouts.mobile_sidebar')

    <section class="hero">
        <h1>Добро пожаловать в Солнышко!</h1>
        <p>Лучшие товары для ваших детей</p>
    </section>
    
    <div class="carousel">
        <div><img src="{{ asset('img/detskaya-odezhda-opt-2-Photoroom (1).png') }}" alt="Image 1"></div>
        <div><img src="{{ asset('img/2231629.jpg') }}" alt="Image 2"></div>
    </div>

    <div class="container">
        <div class="product-grid-wrapper">
            <div class="product-grid">
                <a href="/boys" class="product-item-link">
                    <div class="product-item">
                        <h3>Одежда из флиса</h3>
                        <img src="{{ asset('img/FELS1.png') }}" alt="Одежда из флиса">
                    </div>
                </a>
                <a href="/boys" class="product-item-link">
                    <div class="product-item">
                        <h3>Куртки</h3>
                        <img src="{{ asset('img/Kurtki.png') }}" alt="Куртки">
                    </div>
                </a>
                <a href="/girls" class="product-item-link">
                    <div class="product-item">
                        <h3>Комбинезоны</h3>
                        <img src="{{ asset('img/Kombinezon.png') }}" alt="Комбинезоны">
                    </div>
                </a>
            </div>
            <a href="/newborns" class="product-item-link everyday-clothing">
                <div class="product-item">
                    <h3>Повседневная одежда</h3>
                    <img src="{{ asset('img/Everyday.png') }}" alt="Повседневная одежда">
                </div>
            </a>
        </div>
    </div>



    @include('layouts.footer')
    @include('layouts.scripts')
</body>
</html>