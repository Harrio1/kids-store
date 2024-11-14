<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Витрина детского магазина</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">Магазин</a>
        </div>
        <ul class="nav-links">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Каталог</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <section class="hero">
        <h1>Добро пожаловать в наш магазин!</h1>
        <p>Лучшие товары для ваших детей</p>
        <button>Узнать больше</button>
    </section>

    <div class="product-card">
        <img src="path/to/product/image.jpg" alt="Product Name">
        <h2>Название товара</h2>
        <p>Цена: 1000 руб.</p>
        <button>Купить</button>
    </div>

    <footer>
        <div class="footer-content">
            <p>Контакты: +7 (123) 456-78-90</p>
            <p>Email: info@kidsstore.ru</p>
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">VK</a>
            </div>
        </div>
    </footer>
</body>
</html>