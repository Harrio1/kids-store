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

    <h1>Одежда для девочек</h1>

    <div class="container">
        <div class="filters">
            <div class="filter-category">
                <h3>Ассортимент</h3>
                <ul>
                    <li onclick="toggleSubcategory(this)">Зимняя верхняя одежда
                        <ul class="subcategory" >
                            <li>Комбинезоны</li>
                            <li>Куртки</li>
                            <li>Пальто, плащи</li>
                            <li>Брюки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Осенняя верхняя одежда
                        <ul class="subcategory" >
                            <li>Комбинезоны</li>
                            <li>Куртки</li>
                            <li>Пальто, плащи</li>
                            <li>Брюки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Платья и юбки
                        <ul class="subcategory" >
                            <li>Платья</li>
                            <li>Юбки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Блузки и рубашки
                        <ul class="subcategory" >
                            <li>Блузки</li>
                            <li>Рубашки</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Повседневная одежда
                        <ul class="subcategory" >
                            <li>Футболки</li>
                            <li>Шорты</li>
                            <li>Брюки</li>
                            <li>Джинсы</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Школа и спорт
                        <ul class="subcategory" >
                            <li>Форма</li>
                            <li>Спортивная одежда</li>
                        </ul>
                    </li>
                    <li onclick="toggleSubcategory(this)">Белье, одежда для дома
                        <ul class="subcategory">
                            <li>Пижамы</li>
                            <li>Халаты</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="products">
            <div class="product">
                <div class="image-container">
                    <img src="{{ asset('img/boys/pijam.jpg') }}" alt="Пижама" class="default-image">
                    <img src="{{ asset('img/boys/animate-pijam.jpg') }}" alt="Анимация Пижама" class="hover-image">
                </div>
                <div class="product-name">Пижама для мальчика (джемпер и брюки) из натурального хлопка</div>
                <p class="price">1 299 р.</p>
            </div>
            <div class="product">
                <div class="image-container">
                    <img src="{{ asset('img/boys/pijam2.jpg') }}" alt="Пижама" class="default-image">
                    <img src="{{ asset('img/boys/pijam_animat2.jpg') }}" alt="Пижама" class="hover-image">
                </div>
                <div class="product-name">Пижама для мальчика - футболка и брюки из натурального хлопка</div>
                <p class="price">1 399 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/boys/1_3.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Пижама для мальчика - футболка и брюки из натурального хлопка</div>
                <p class="price">1 399 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/boys/1_4.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Халат из петельчатого флиса для мальчика</div>
                <p class="price">1 999 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/boys/1_5.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Халат из петельчатого флиса для мальчика</div>
                <p class="price">1 799 р.</p>
            </div>
            <div class="product no-animation">
                <div class="image-container">
                    <img src="{{ asset('img/boys/1_6.jpg') }}" alt="Пижама" class="default-image">
                </div>
                <div class="product-name">Пижама для мальчика (джемпер и брюки) из натурального хлопка</div>
                <p class="price">1 199 р.</p>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function toggleSubcategory(element) {
            console.log('Toggle subcategory called');
            const subcategory = element.querySelector('.subcategory');
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
