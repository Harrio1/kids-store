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
    <div id="sidebar" class="sidebar">
        <ul class="sidebar-links">
            <li><a href="#">Мальчики 2-13 лет</a></li>
            <li><a href="#">Девочки 2-13 лет</a></li>
            <li><a href="#">Новорожденные 0-2 лет</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </div>

    <section class="hero">
        <h1>Добро пожаловать в Солнышко!</h1>
        <p>Лучшие товары для ваших детей</p>
    </section>
    
    <div class="carousel" style="height: 322px;">
        <div><img src="{{ asset('img/detskaya-odezhda-opt-2-Photoroom (1).png') }}" alt="Image 1"></div>
        <div><img src="{{ asset('img/2231629.jpg') }}" alt="Image 2"></div>
    </div>

    <div class="container">
        <div class="product-grid">
            <div class="product-item">
                <h3>Одежда из флиса</h3>
                <img src="{{ asset('img/FELS1.png') }}" alt="Одежда из флиса">
            </div>
            <div class="product-item kurtki">
                <h3>Куртки</h3>
                <img src="{{ asset('img/Kurtki.png') }}" alt="Куртки">
            </div>
            <div class="product-item">
                <h3>Комбинезоны</h3>
                <img src="{{ asset('img/Kombinezon.png') }}" alt="Комбинезоны">
            </div>
            <div class="product-item">
                <h3>Повседневная одежда</h3>
                <img src="{{ asset('img/Everyday.png') }}" alt="Повседневная одежда">
            </div>
        </div>
    </div>



    @include('layouts.footer')
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const isVisible = dropdown.style.display === 'block';
            document.querySelectorAll('.dropdown-content').forEach(el => el.style.display = 'none');
            dropdown.style.display = isVisible ? 'none' : 'block';
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.style.width = sidebar.style.width === '250px' ? '0' : '250px';
        }

        $(document).ready(function(){
            $('.carousel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });

      

        // Удалите или закомментируйте эти строки, если карта не нужна
        // ymaps.ready(init);

        // function init() {
        //     // Ваш код для работы с картой
        // }
    </script>
</body>
</html>