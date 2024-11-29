<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <button id="back-button" onclick="showMainMenu()" style="display: none;">Назад</button>
        <span class="close-btn" onclick="closeSidebar()">&times;</span>
    </div>
    <div id="sidebar-content">
        <ul class="sidebar-links" id="main-menu">
            <li onclick="showBoysMenu()">Мальчики 2-13 лет</li>
            <li onclick="showGirlsMenu()">Девочки 2-13 лет</li>
            <li onclick="showNewbornsMenu()">Новорожденные 0-2 лет</li>
        </ul>
        <ul class="sidebar-links" id="boys-menu" style="display: none;">
            <h3>Мальчики 2-13 лет</h3>
            <li><a href="/boys">Вся одежда</a></li>
            <li onclick="toggleSubcategory(this)">Зимняя верхняя одежда
                <ul class="subcategory" style="display: none;">
                    <li>Комбинезоны</li>
                    <li>Куртки</li>
                    <li>Пальто, плащи</li>
                    <li>Брюки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Осенняя верхняя одежда
                <ul class="subcategory" style="display: none;">
                    <li>Комбинезоны</li>
                    <li>Комбинезоны-конверты</li>
                    <li>Утепленные куртки и жилеты</li>
                    <li>Ветровки</li>
                    <li>Брюки</li>
                    <li>Жилеты</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Поддева под комбинезоны
                <ul class="subcategory" style="display: none;">
                    <li>Первый слой</li>
                    <li>Флисовые куртки</li>
                    <li>Флисовые брюки</li>
                    <li>Флисовые комбинезоны</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Головные уборы, шарфы
                <ul class="subcategory" style="display: none;">
                    <li>Шапки весенние</li>
                    <li>Шапки зимние</li>
                    <li>Шарфы, манишки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Рукавицы, перчатки
                <ul class="subcategory" style="display: none;">
                    <li>Рукавицы</li>
                    <li>Перчатки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Повседневная одежда
                <ul class="subcategory" style="display: none;">
                    <li>Футболки</li>
                    <li>Шорты</li>
                    <li>Брюки</li>
                    <li>Джинсы</li>
                    <li>Толстовки, джемперы</li>
                    <li>Жакеты, куртки</li>
                    <li>Комплекты</li>
                    <li>Вязаная одежда для мальчиков</li>
                    <li>Водолазки</li>
                    <li>Комбинезоны, полукомбинезоны</li>
                    <li>Пиджаки, рубашки, жилеты</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Школа и спорт
                <ul class="subcategory" style="display: none;">
                    <li>Форма</li>
                    <li>Спортивная одежда</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Белье, одежда для дома
                <ul class="subcategory" style="display: none;">
                    <li>Пижамы</li>
                    <li>Халаты</li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-links" id="girls-menu" style="display: none;">
            <h3>Девочки 2-13 лет</h3>
            <li><a href="/girls">Вся одежда</a></li>
            <li onclick="toggleSubcategory(this)">Зимняя верхняя одежда
                <ul class="subcategory" style="display: none;">
                    <li>Комбинезоны</li>
                    <li>Куртки</li>
                    <li>Пальто, плащи</li>
                    <li>Брюки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Осенняя верхняя одежда
                <ul class="subcategory" style="display: none;">
                    <li>Комбинезоны</li>
                    <li>Комбинезоны-конверты</li>
                    <li>Утепленные куртки и жилеты</li>
                    <li>Ветровки</li>
                    <li>Брюки</li>
                    <li>Жилеты</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Поддева под комбинезоны
                <ul class="subcategory" style="display: none;">
                    <li>Первый слой</li>
                    <li>Флисовые куртки</li>
                    <li>Флисовые брюки</li>
                    <li>Флисовые комбинезоны</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Головные уборы, шарфы
                <ul class="subcategory" style="display: none;">
                    <li>Шапки весенние</li>
                    <li>Шапки зимние</li>
                    <li>Шарфы, манишки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Рукавицы, перчатки
                <ul class="subcategory" style="display: none;">
                    <li>Рукавицы</li>
                    <li>Перчатки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Повседневная одежда
                <ul class="subcategory" style="display: none;">
                    <li>Футболки</li>
                    <li>Шорты</li>
                    <li>Брюки</li>
                    <li>Джинсы</li>
                    <li>Толстовки, джемперы</li>
                    <li>Жакеты, куртки</li>
                    <li>Комплекты</li>
                    <li>Вязаная одежда для девочек</li>
                    <li>Водолазки</li>
                    <li>Комбинезоны, полукомбинезоны</li>
                    <li>Пиджаки, рубашки, жилеты</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Школа и спорт
                <ul class="subcategory" style="display: none;">
                    <li>Форма</li>
                    <li>Спортивная одежда</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Белье, одежда для дома
                <ul class="subcategory" style="display: none;">
                    <li>Пижамы</li>
                    <li>Халаты</li>
                </ul>
            </li>
        </ul>
        <ul class="sidebar-links" id="newborns-menu" style="display: none;">
            <h3>Новорожденные 0-2 лет</h3>
            <li><a href="/newborns">Вся одежда</a></li>
            <li onclick="toggleSubcategory(this)">Верхняя одежда
                <ul class="subcategory" style="display: none;">
                    <li>Зимние комбинезоны</li>
                    <li>Осенние комбинезоны</li>
                    <li>Куртки</li>
                    <li>Пальто</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Товары для новорожденных
                <ul class="subcategory" style="display: none;">
                    <li>Комбинезоны-конверты</li>
                    <li>Аксессуары</li>
                    <li>Шапочки</li>
                    <li>Носочки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Боди и песочники
                <ul class="subcategory" style="display: none;">
                    <li>Боди</li>
                    <li>Песочники</li>
                    <li>Ползунки</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Комплекты
                <ul class="subcategory" style="display: none;">
                    <li>Комплекты для новорожденных</li>
                    <li>Подарочные наборы</li>
                    <li>Крестильные наборы</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Пеленки и одеяла
                <ul class="subcategory" style="display: none;">
                    <li>Пеленки</li>
                    <li>Одеяла</li>
                    <li>Пледы</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Белье и одежда для дома
                <ul class="subcategory" style="display: none;">
                    <li>Пижамы</li>
                    <li>Халаты</li>
                    <li>Комбинезоны для сна</li>
                </ul>
            </li>
            <li onclick="toggleSubcategory(this)">Обувь
                <ul class="subcategory" style="display: none;">
                    <li>Пинетки</li>
                    <li>Тапочки</li>
                </ul>
            </li>
        </ul>
    </div>
</div>

