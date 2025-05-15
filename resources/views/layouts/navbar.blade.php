<nav class="navbar navbar-expand-lg py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/logo/sunnyshko-text-logo.svg') }}" alt="Солнышко" height="40" class="d-inline-block align-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav main-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="boysDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Для мальчиков
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu" aria-labelledby="boysDropdown">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Каталог</h6>
                                    <a class="dropdown-item" href="{{ route('boys') }}">Все товары</a>
                                    <a class="dropdown-item" href="#">Новинки</a>
                                    <a class="dropdown-item" href="#">Акции и скидки</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Одежда</h6>
                                    <a class="dropdown-item" href="#">Футболки</a>
                                    <a class="dropdown-item" href="#">Брюки</a>
                                    <a class="dropdown-item" href="#">Толстовки</a>
                                    <a class="dropdown-item" href="#">Джинсы</a>
                                    <a class="dropdown-item" href="#">Шорты</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Верхняя одежда</h6>
                                    <a class="dropdown-item" href="#">Куртки</a>
                                    <a class="dropdown-item" href="#">Комбинезоны</a>
                                    <a class="dropdown-item" href="#">Жилеты</a>
                                    <a class="dropdown-item" href="#">Шапки</a>
                                </div>
                                <div class="col-md-3">
                                    <div class="menu-featured">
                                        <img src="{{ asset('img/boys/1_4.jpg') }}" class="img-fluid rounded" alt="Для мальчиков">
                                        <div class="menu-featured-content">
                                            <h6>Новая коллекция</h6>
                                            <a href="{{ route('boys') }}" class="btn btn-sm btn-outline-light">Смотреть</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="girlsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Для девочек
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu" aria-labelledby="girlsDropdown">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Каталог</h6>
                                    <a class="dropdown-item" href="{{ route('girls') }}">Все товары</a>
                                    <a class="dropdown-item" href="#">Новинки</a>
                                    <a class="dropdown-item" href="#">Акции и скидки</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Одежда</h6>
                                    <a class="dropdown-item" href="#">Футболки</a>
                                    <a class="dropdown-item" href="#">Платья</a>
                                    <a class="dropdown-item" href="#">Юбки</a>
                                    <a class="dropdown-item" href="#">Брюки</a>
                                    <a class="dropdown-item" href="#">Шорты</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Верхняя одежда</h6>
                                    <a class="dropdown-item" href="#">Куртки</a>
                                    <a class="dropdown-item" href="#">Комбинезоны</a>
                                    <a class="dropdown-item" href="#">Жилеты</a>
                                    <a class="dropdown-item" href="#">Шапки</a>
                                </div>
                                <div class="col-md-3">
                                    <div class="menu-featured">
                                        <img src="{{ asset('img/girls/4.jpg') }}" class="img-fluid rounded" alt="Для девочек">
                                        <div class="menu-featured-content">
                                            <h6>Новая коллекция</h6>
                                            <a href="{{ route('girls') }}" class="btn btn-sm btn-outline-light">Смотреть</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newbornsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Для новорожденных
                    </a>
                    <div class="dropdown-menu mega-dropdown-menu" aria-labelledby="newbornsDropdown">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Каталог</h6>
                                    <a class="dropdown-item" href="{{ route('newborns') }}">Все товары</a>
                                    <a class="dropdown-item" href="#">Новинки</a>
                                    <a class="dropdown-item" href="#">Акции и скидки</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Одежда</h6>
                                    <a class="dropdown-item" href="#">Боди</a>
                                    <a class="dropdown-item" href="#">Ползунки</a>
                                    <a class="dropdown-item" href="#">Комбинезоны</a>
                                    <a class="dropdown-item" href="#">Комплекты</a>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="dropdown-header">Аксессуары</h6>
                                    <a class="dropdown-item" href="#">Конверты</a>
                                    <a class="dropdown-item" href="#">Пеленки</a>
                                    <a class="dropdown-item" href="#">Шапочки</a>
                                    <a class="dropdown-item" href="#">Царапки</a>
                                </div>
                                <div class="col-md-3">
                                    <div class="menu-featured">
                                        <img src="{{ asset('img/newborns/7.jpg') }}" class="img-fluid rounded" alt="Для новорожденных">
                                        <div class="menu-featured-content">
                                            <h6>Новая коллекция</h6>
                                            <a href="{{ route('newborns') }}" class="btn btn-sm btn-outline-light">Смотреть</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Контакты</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item theme-toggle mr-2">
                    <button class="btn btn-sm" id="theme-toggle">
                        <i class="fas fa-moon dark-icon"></i>
                        <i class="fas fa-sun light-icon" style="display: none;"></i>
                    </button>
                </li>
                <li class="nav-item search-box">
                    <form class="form-inline my-2 my-lg-0 search-form">
                        <div class="input-group">
                            <input class="form-control search-input" type="search" placeholder="Поиск товаров" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-search" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="nav-item position-relative cart-icon">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        @if(session()->has('cart') && count(session('cart')) > 0)
                            <span class="badge badge-pill badge-danger badge-cart">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                </li>
                
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-1"></i>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="authDropdown">
                            @if(Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Панель администратора
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users') }}">
                                    <i class="fas fa-users mr-2"></i>Пользователи
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                    <i class="fas fa-tshirt mr-2"></i>Управление товарами
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                    <i class="fas fa-folder mr-2"></i>Управление категориями
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.orders.index') }}">
                                    <i class="fas fa-clipboard-list mr-2"></i>Управление заказами
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('account.dashboard') }}">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Личный кабинет
                                </a>
                                <a class="dropdown-item" href="{{ route('account.orders') }}">
                                    <i class="fas fa-shopping-bag mr-2"></i>Мои заказы
                                </a>
                                <a class="dropdown-item" href="{{ route('account.profile') }}">
                                    <i class="fas fa-user-edit mr-2"></i>Мой профиль
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Выйти
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">
                            <i class="fas fa-sign-in-alt mr-1"></i>Войти
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#registerModal">
                            <i class="fas fa-user-plus mr-1"></i>Регистрация
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

