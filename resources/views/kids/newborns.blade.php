<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Одежда для девочек</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boysstyle.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @include('layouts.navbar')
    
    @include('layouts.mobile_sidebar')

    <h1>Одежда для новорожденных </h1>

    <div class="container">
        <div class="filters">
            <div class="filter-category">
                <h3>Ассортимент</h3>
                <ul>
                    <li onclick="toggleSubcategory(this)">Верхняя одежда
                        <ul class="subcategory">
                            <li>Зимние комбинезоны</li>
                            <li>Осенние комбинезоны</li>
                            <li>Куртки</li>
                            <li>Пальто</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Товары для новорожденных
                        <ul class="subcategory">
                            <li>Комбинезоны-конверты</li>
                            <li>Аксессуары</li>
                            <li>Шапочки</li>
                            <li>Носочки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Боди и песочники
                        <ul class="subcategory">
                            <li>Боди</li>
                            <li>Песочники</li>
                            <li>Ползунки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Комплекты
                        <ul class="subcategory" >
                            <li>Комплекты для новорожденных</li>
                            <li>Подарочные наборы</li>
                            <li>Крестильные наборы</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Пеленки и одеяла
                        <ul class="subcategory">
                            <li>Пеленки</li>
                            <li>Одеяла</li>
                            <li>Пледы</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Белье и одежда для дома
                        <ul class="subcategory">
                            <li>Пижамы</li>
                            <li>Халаты</li>
                            <li>Комбинезоны для сна</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Обувь
                        <ul class="subcategory">
                            <li>Пинетки</li>
                            <li>Тапочки</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="products">
            <div class="product">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/1_1.jpg') }}" alt="Пижама" class="default-image">
                    <img src="{{ asset('img/newborns/1_2.jpg') }}" alt="Анимация Пижама" class="hover-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 299 р.</p>
            </div>
            <div class="product">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/2_1.jpg') }}" alt="Пижама" class="default-image">
                    <img src="{{ asset('img/newborns/2_2.jpg') }}" alt="Анимация Пижама" class="hover-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 399 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/3.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 399 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/4.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 999 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/7.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 799 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/newborns/8.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Комбинезон утепленный для мальчика</div>
                <p class="price">5 199 р.</p>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function toggleSubcategory(element) {
            const subcategory = element.querySelector('ul');
            if (subcategory) {
                const isVisible = subcategory.style.display === 'block';
                subcategory.style.display = isVisible ? 'none' : 'block';
                element.classList.toggle('active', !isVisible);
            }
        }
    </script>
     @include('layouts.scripts')
</body>
</html>
