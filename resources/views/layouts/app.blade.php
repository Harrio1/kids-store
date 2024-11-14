<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Солнышко - Витрина детского магазина</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#">Солнышко</a>
        </div>
        <ul class="nav-links">
            <li><a href="#">Главная</a></li>
            <li class="dropdown">
                <a href="#">Мальчики 2-13 лет</a>
                <div class="dropdown-content">
                    <div class="column">
                        <h3>Зимняя верхняя одежда</h3>
                        <ul>
                            <li><a href="#">Комбинезоны</a></li>
                            <li><a href="#">Куртки</a></li>
                            <li><a href="#">Пальто, плащи</a></li>
                            <li><a href="#">Брюки</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3>Осенняя верхняя одежда</h3>
                        <ul>
                            <li><a href="#">Комбинезоны</a></li>
                            <li><a href="#">Ветровки</a></li>
                            <li><a href="#">Жилеты</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Девочки 2-13 лет</a>
                <div class="dropdown-content">
                    <div class="column">
                        <h3>Платья</h3>
                        <ul>
                            <li><a href="#">Летние</a></li>
                            <li><a href="#">Вечерние</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3>Рубашки, блузки</h3>
                        <ul>
                            <li><a href="#">Классические</a></li>
                            <li><a href="#">Повседневные</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#">Новорожденные 0-2 лет</a>
                <div class="dropdown-content">
                    <div class="column">
                        <h3>Верхняя одежда</h3>
                        <ul>
                            <li><a href="#">Зимние комбинезоны</a></li>
                            <li><a href="#">Осенние комбинезоны</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h3>Товары для новорожденных</h3>
                        <ul>
                            <li><a href="#">Комбинезоны-конверты</a></li>
                            <li><a href="#">Аксессуары</a></li>
                        </ul>
                    </div>
                </div>
            </li>
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
        <h1>Добро пожаловать в Солнышко!</h1>
        <p>Лучшие товары для ваших детей</p>
    </section>

    <footer>
        <div class="footer-content">
            <p>Контакты: +7 (123) 456-78-90</p>
        </div>
    </footer>
</body>
</html>