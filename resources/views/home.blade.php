@extends('layouts.app')

@section('content')
<!-- Главный слайдер -->
<div id="mainCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#mainCarousel" data-slide-to="1"></li>
        <li data-target="#mainCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/slider/banner1.jpg') }}" class="d-block w-100" alt="Детская одежда">
            <div class="carousel-caption">
                <h2>Новая коллекция весна-лето 2025</h2>
                <p>Яркие цвета для ярких детей</p>
                <a href="#" class="btn btn-primary">Смотреть коллекцию</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/slider/banner2.jpg') }}" class="d-block w-100" alt="Скидки на зимнюю одежду">
            <div class="carousel-caption">
                <h2>Скидки до 30% на зимние коллекции</h2>
                <p>Спешите приобрести качественную зимнюю одежду по выгодным ценам</p>
                <a href="#" class="btn btn-primary">К товарам со скидкой</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/slider/banner3.jpg') }}" class="d-block w-100" alt="Для новорожденных">
            <div class="carousel-caption">
                <h2>Всё для новорожденных</h2>
                <p>Мягкие и безопасные материалы для самых маленьких</p>
                <a href="{{ route('newborns') }}" class="btn btn-primary">Перейти в каталог</a>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Предыдущий</span>
    </a>
    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Следующий</span>
    </a>
</div>

<!-- Основные категории -->
<div class="container mt-5">
    <div class="main-categories">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="main-category-card">
                    <a href="{{ route('boys') }}">
                        <div class="category-image">
                            <img src="{{ asset('img/categories/boys-main.jpg') }}" alt="Мальчикам 2-12 лет" class="img-fluid">
                        </div>
                        <div class="category-title">
                            <h3>Мальчикам 2-12 лет</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="main-category-card">
                    <a href="{{ route('girls') }}">
                        <div class="category-image">
                            <img src="{{ asset('img/categories/girls-main.jpg') }}" alt="Девочкам 2-12 лет" class="img-fluid">
                        </div>
                        <div class="category-title">
                            <h3>Девочкам 2-12 лет</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="main-category-card">
                    <a href="{{ route('newborns') }}">
                        <div class="category-image">
                            <img src="{{ asset('img/categories/newborns-main.jpg') }}" alt="Малышам 0-2 лет" class="img-fluid">
                        </div>
                        <div class="category-title">
                            <h3>Малышам 0-2 лет</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Популярные категории -->
<div class="container mt-5">
    <h2 class="section-title">Популярные категории</h2>
    <div class="popular-categories">
        <div class="row">
            <div class="col-6 col-md-3 mb-4">
                <div class="pop-category-card">
                    <a href="#">
                        <div class="category-image rounded-circle">
                            <img src="{{ asset('img/categories/jackets.jpg') }}" alt="Верхняя одежда" class="img-fluid">
                        </div>
                        <div class="category-title text-center mt-3">
                            <h5>Верхняя одежда</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="pop-category-card">
                    <a href="#">
                        <div class="category-image rounded-circle">
                            <img src="{{ asset('img/categories/tshirts.jpg') }}" alt="Футболки и лонгсливы" class="img-fluid">
                        </div>
                        <div class="category-title text-center mt-3">
                            <h5>Футболки и лонгсливы</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="pop-category-card">
                    <a href="#">
                        <div class="category-image rounded-circle">
                            <img src="{{ asset('img/categories/pants.jpg') }}" alt="Брюки и джинсы" class="img-fluid">
                        </div>
                        <div class="category-title text-center mt-3">
                            <h5>Брюки и джинсы</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="pop-category-card">
                    <a href="#">
                        <div class="category-image rounded-circle">
                            <img src="{{ asset('img/categories/underwear.jpg') }}" alt="Нижнее белье" class="img-fluid">
                        </div>
                        <div class="category-title text-center mt-3">
                            <h5>Нижнее белье</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Новинки верхней одежды -->
<div class="container mt-5">
    <h2 class="section-title">Новинки верхней одежды</h2>
    <div class="row">
        <div class="col-6 col-md-3 mb-4">
            <div class="product-card">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ asset('img/products/jacket1.jpg') }}" alt="Куртка для мальчика">
                        <div class="product-badge bg-danger">-12%</div>
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title">Куртка демисезонная для мальчика</div>
                    <div class="product-article text-muted small">Артикул: ВК 32118/н</div>
                    <div class="product-price mb-2"><span class="old-price">4 999 ₽</span> 4 399 ₽</div>
                    <div class="product-actions d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-primary">Подробнее</a>
                        <form action="{{ route('cart.add', 1) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="size" value="104">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-4">
            <div class="product-card">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ asset('img/products/jacket2.jpg') }}" alt="Комбинезон для девочки">
                        <div class="product-badge bg-danger">-22%</div>
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title">Комбинезон для девочки утепленный</div>
                    <div class="product-article text-muted small">Артикул: ВК 60088/н</div>
                    <div class="product-price mb-2"><span class="old-price">5 499 ₽</span> 4 299 ₽</div>
                    <div class="product-actions d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-primary">Подробнее</a>
                        <form action="{{ route('cart.add', 2) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="size" value="98">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-4">
            <div class="product-card">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ asset('img/products/jacket3.jpg') }}" alt="Брюки утепленные">
                        <div class="product-badge bg-danger">-13%</div>
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title">Брюки утепленные демисезонные</div>
                    <div class="product-article text-muted small">Артикул: ВК 46016/25</div>
                    <div class="product-price mb-2"><span class="old-price">3 799 ₽</span> 3 299 ₽</div>
                    <div class="product-actions d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-primary">Подробнее</a>
                        <form action="{{ route('cart.add', 3) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="size" value="110">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-4">
            <div class="product-card">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ asset('img/products/jacket4.jpg') }}" alt="Комбинезон утепленный">
                        <div class="product-badge bg-danger">-12%</div>
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title">Комбинезон утепленный для мальчика</div>
                    <div class="product-article text-muted small">Артикул: ВК 60108/3</div>
                    <div class="product-price mb-2"><span class="old-price">5 899 ₽</span> 5 199 ₽</div>
                    <div class="product-actions d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-primary">Подробнее</a>
                        <form action="{{ route('cart.add', 4) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="size" value="86">
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="#" class="btn btn-outline-primary">Смотреть все новинки</a>
    </div>
</div>

<!-- Коллекции -->
<div class="container mt-5">
    <h2 class="section-title">Коллекции</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="collection-card">
                <a href="#">
                    <div class="collection-img">
                        <img src="{{ asset('img/collections/collection1.jpg') }}" alt="Городской стиль" class="img-fluid">
                        <div class="collection-overlay">
                            <div class="collection-name">№536 Городской стиль</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="collection-card">
                <a href="#">
                    <div class="collection-img">
                        <img src="{{ asset('img/collections/collection2.jpg') }}" alt="Футбол" class="img-fluid">
                        <div class="collection-overlay">
                            <div class="collection-name">№534 Футбол</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="collection-card">
                <a href="#">
                    <div class="collection-img">
                        <img src="{{ asset('img/collections/collection3.jpg') }}" alt="Сафари" class="img-fluid">
                        <div class="collection-overlay">
                            <div class="collection-name">№542 Сафари</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="#" class="btn btn-outline-primary">Все коллекции</a>
    </div>
</div>

<!-- Информация о бренде -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="section-title">О бренде "Солнышко"</h2>
            <p>Детский магазин "Солнышко" - это современный российский бренд качественной одежды для детей от 0 до 12 лет.</p>
            <p>В нашем ассортименте представлены:</p>
            <ul>
                <li>коллекции повседневного трикотажа</li>
                <li>одежда для новорожденных и детей ясельного возраста</li>
                <li>нижнее белье из 100% хлопка</li>
                <li>верхняя одежда (зимние куртки, комбинезоны, брюки из мембранной ткани)</li>
                <li>головные уборы, шарфы, аксессуары</li>
                <li>чулочно-носочный ассортимент</li>
            </ul>
            <p>Все коллекции разрабатываются нашими дизайнерами по принципу total look, что позволяет составлять гармоничные образы для вашего ребенка.</p>
            <a href="#" class="btn btn-primary mt-3">Подробнее о бренде</a>
        </div>
        <div class="col-md-6">
            <div class="brand-features">
                <div class="feature-item d-flex align-items-center mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-check-circle fa-2x text-primary"></i>
                    </div>
                    <div class="feature-text ml-3">
                        <h5 class="mb-1">Безопасные материалы</h5>
                        <p class="mb-0">Используем только безопасные и натуральные ткани для детской кожи</p>
                    </div>
                </div>
                <div class="feature-item d-flex align-items-center mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-truck fa-2x text-primary"></i>
                    </div>
                    <div class="feature-text ml-3">
                        <h5 class="mb-1">Доставка по всей России</h5>
                        <p class="mb-0">Отправляем заказы во все регионы удобным для вас способом</p>
                    </div>
                </div>
                <div class="feature-item d-flex align-items-center mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-undo fa-2x text-primary"></i>
                    </div>
                    <div class="feature-text ml-3">
                        <h5 class="mb-1">Удобный возврат</h5>
                        <p class="mb-0">Возврат в течение 14 дней, если размер или модель не подошли</p>
                    </div>
                </div>
                <div class="feature-item d-flex align-items-center">
                    <div class="feature-icon">
                        <i class="fas fa-percent fa-2x text-primary"></i>
                    </div>
                    <div class="feature-text ml-3">
                        <h5 class="mb-1">Система скидок</h5>
                        <p class="mb-0">Накопительные скидки до 30% для постоянных клиентов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Подписка на рассылку -->
<div class="container mt-5">
    <div class="subscription-box bg-light p-4 rounded">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h3>Подпишитесь на e-mail рассылку и получите скидку на первый заказ!</h3>
                <p class="mb-lg-0">Будьте в курсе новых коллекций и акций магазина</p>
            </div>
            <div class="col-lg-5">
                <form class="subscription-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Ваш e-mail" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Подписаться</button>
                        </div>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="agree" required>
                        <label class="form-check-label small" for="agree">
                            Согласен на обработку персональных данных
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        // Инициализация карусели
        $('.carousel').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false
        });
    });
</script>
@endsection