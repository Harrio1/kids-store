<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Солнышко - Витрина детского магазина</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="background">
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
        <div class="burger" onclick="toggleSidebar()">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <ul class="sidebar-links">
            <li><a href="#">Главная</a></li>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block w-100" style="height: 300px; background-color: #ccc;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Подпись 1</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-block w-100" style="height: 300px; background-color: #aaa;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Подпись 2</h5>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-block w-100" style="height: 300px; background-color: #888;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Подпись 3</h5>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
            <span class="sr-only">Next</span>
        </a>
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

    <footer>
        <div class="footer-content">
            <p>Контакты: +7 (123) 456-78-90</p>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.style.width === '250px') {
                sidebar.style.width = '0';
            } else {
                sidebar.style.width = '250px';
            }
        }
    </script>
</body>
</html>