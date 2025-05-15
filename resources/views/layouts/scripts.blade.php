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

    function openSidebar() {
        document.getElementById('sidebar').style.width = '250px';
    }

    function closeSidebar() { 
        showMainMenu();
        document.getElementById('sidebar').style.width = '0';
    }

    function showMainMenu() {
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'block';
        document.getElementById('back-button').style.display = 'none';
    }

    function showBoysMenu() {
        document.getElementById('boys-menu').style.display = 'block';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }

    function showGirlsMenu() {
        document.getElementById('girls-menu').style.display = 'block';
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('newborns-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }

    function showNewbornsMenu() {
        document.getElementById('newborns-menu').style.display = 'block';
        document.getElementById('boys-menu').style.display = 'none';
        document.getElementById('girls-menu').style.display = 'none';
        document.getElementById('main-menu').style.display = 'none';
        document.getElementById('back-button').style.display = 'block';
    }
    
    function toggleSubcategory(element) {
        const subcategory = element.querySelector('.subcategory');
        if (subcategory) {
            const isVisible = subcategory.style.display === 'block';
            subcategory.style.display = isVisible ? 'none' : 'block';
            element.classList.toggle('active', !isVisible);
        }
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

        // Показать уведомления об успехе
        $('.toast').toast('show');
        
        // Переключение между модальными окнами
        $('#showRegisterModal').click(function() {
            $('#loginModal').modal('hide');
            $('#registerModal').modal('show');
        });
        
        $('#showLoginModal').click(function() {
            $('#registerModal').modal('hide');
            $('#loginModal').modal('show');
        });
        
        // Обработка формы входа
        $('#loginButton').click(function() {
            const form = $('#loginForm');
            const loginError = $('#login-error');
            
            // Сброс предыдущих ошибок
            loginError.hide();
            form.find('.is-invalid').removeClass('is-invalid');
            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Перезагрузка страницы при успешном входе
                    window.location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        
                        // Отображение ошибок валидации
                        $.each(errors, function(field, messages) {
                            const input = $('#login-' + field);
                            const feedback = $('#login-' + field + '-error');
                            
                            input.addClass('is-invalid');
                            feedback.text(messages[0]);
                        });
                    } else {
                        // Общая ошибка аутентификации
                        loginError.text('Неверный email или пароль.').show();
                    }
                }
            });
        });
        
        // Обработка формы регистрации
        $('#registerButton').click(function() {
            const form = $('#registerForm');
            const registerError = $('#register-error');
            
            // Сброс предыдущих ошибок
            registerError.hide();
            form.find('.is-invalid').removeClass('is-invalid');
            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Перезагрузка страницы при успешной регистрации
                    window.location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        
                        // Отображение ошибок валидации
                        $.each(errors, function(field, messages) {
                            const input = $('#register-' + field);
                            const feedback = $('#register-' + field + '-error');
                            
                            input.addClass('is-invalid');
                            feedback.text(messages[0]);
                        });
                    } else {
                        // Общая ошибка регистрации
                        registerError.text('Ошибка при регистрации. Пожалуйста, попробуйте позже.').show();
                    }
                }
            });
        });
    });

    // Обновленный скрипт для исправления цвета текста в бейджах
    document.addEventListener('DOMContentLoaded', function() {
        // Функция для принудительного установления инлайн-стилей
        function forceApplyBadgeStyles() {
            // Жестко заданные стили
            const styles = {
                'badge-primary': { 
                    bg: '#007bff', 
                    color: '#ffffff', 
                    border: '1px solid #0062cc'
                },
                'badge-danger': { 
                    bg: '#dc3545', 
                    color: '#ffffff', 
                    border: '1px solid #bd2130'
                },
                'badge-success': { 
                    bg: '#28a745', 
                    color: '#ffffff', 
                    border: '1px solid #1e7e34'
                },
                'badge-info': { 
                    bg: '#17a2b8', 
                    color: '#ffffff', 
                    border: '1px solid #117a8b'
                },
                'badge-warning': { 
                    bg: '#ffc107', 
                    color: '#212529', 
                    border: '1px solid #d39e00'
                },
                'badge-secondary': { 
                    bg: '#6c757d', 
                    color: '#ffffff', 
                    border: '1px solid #545b62'
                }
            };

            // Находим все бейджи на странице
            const badges = document.querySelectorAll('.badge');
            
            badges.forEach(badge => {
                // Определяем тип бейджа
                let badgeType = '';
                for (const cls of badge.classList) {
                    if (cls.startsWith('badge-') && styles[cls]) {
                        badgeType = cls;
                        break;
                    }
                }
                
                if (badgeType) {
                    // Полностью переопределяем стили бейджа
                    const style = styles[badgeType];
                    
                    // Устанавливаем стили напрямую в элемент, минуя CSS
                    badge.style.setProperty('background-color', style.bg, 'important');
                    badge.style.setProperty('color', style.color, 'important');
                    badge.style.setProperty('border', style.border, 'important');
                    badge.style.setProperty('text-shadow', '0 1px 2px rgba(0,0,0,0.4)', 'important');
                    badge.style.setProperty('pointer-events', 'none', 'important');
                    badge.style.setProperty('font-weight', 'bold', 'important');
                    badge.style.setProperty('padding', '0.35em 0.6em', 'important');
                    badge.style.setProperty('display', 'inline-block', 'important');
                    badge.style.setProperty('line-height', '1', 'important');
                    badge.style.setProperty('text-align', 'center', 'important');
                    badge.style.setProperty('white-space', 'nowrap', 'important');
                    badge.style.setProperty('vertical-align', 'baseline', 'important');
                    badge.style.setProperty('position', 'relative', 'important');
                    badge.style.setProperty('z-index', '100', 'important');
                    
                    // Сохраняем оригинальный текст как дата-атрибут
                    if (!badge.dataset.originalText) {
                        badge.dataset.originalText = badge.textContent;
                    }
                }
            });
        }
        
        // Функция для обработки наведения на строки таблицы
        function handleTableRowHover() {
            const tableRows = document.querySelectorAll('table tr');
            
            tableRows.forEach(row => {
                // При наведении на строку таблицы
                row.addEventListener('mouseenter', function() {
                    // Найти все бейджи в строке
                    const badges = this.querySelectorAll('.badge');
                    
                    badges.forEach(badge => {
                        // Запоминаем тип бейджа
                        let badgeType = '';
                        for (const cls of badge.classList) {
                            if (cls.startsWith('badge-')) {
                                badgeType = cls;
                                break;
                            }
                        }
                        
                        // В зависимости от типа бейджа задаем разные цвета
                        if (badgeType === 'badge-primary') {
                            badge.style.setProperty('background-color', '#007bff', 'important');
                            badge.style.setProperty('color', '#ffffff', 'important');
                        } else if (badgeType === 'badge-danger') {
                            badge.style.setProperty('background-color', '#dc3545', 'important');
                            badge.style.setProperty('color', '#ffffff', 'important');
                        } else if (badgeType === 'badge-success') {
                            badge.style.setProperty('background-color', '#28a745', 'important');
                            badge.style.setProperty('color', '#ffffff', 'important');
                        } else if (badgeType === 'badge-warning') {
                            badge.style.setProperty('background-color', '#ffc107', 'important');
                            badge.style.setProperty('color', '#212529', 'important');
                        } else if (badgeType === 'badge-info') {
                            badge.style.setProperty('background-color', '#17a2b8', 'important');
                            badge.style.setProperty('color', '#ffffff', 'important');
                        } else if (badgeType === 'badge-secondary') {
                            badge.style.setProperty('background-color', '#6c757d', 'important');
                            badge.style.setProperty('color', '#ffffff', 'important');
                        }
                        
                        // Дополнительно восстанавливаем текст из data-атрибута
                        if (badge.dataset.originalText) {
                            badge.textContent = badge.dataset.originalText;
                        }
                    });
                });
                
                // При выходе из строки таблицы (можно убрать, если не нужно)
                row.addEventListener('mouseleave', function() {
                    forceApplyBadgeStyles();
                });
            });
        }
        
        // Запускаем все функции сразу при загрузке страницы
        forceApplyBadgeStyles();
        handleTableRowHover();
        
        // Запускаем с интервалом для страхования
        setInterval(forceApplyBadgeStyles, 500);
        
        // Также запускаем при изменении темы
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                setTimeout(function() {
                    forceApplyBadgeStyles();
                    handleTableRowHover();
                }, 100);
            });
        }
    });
</script> 