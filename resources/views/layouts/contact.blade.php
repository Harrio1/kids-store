<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Контакты</title>
        <!-- Fonts -->
        

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f8fafc;
            }
            .contact-container {
                text-align: center;
            }
        </style>
    </head>
    <body>
        @include('layouts.navbar')
        @include('layouts.mobile_sidebar')
        <div class="contact-container">
            <h1>Контакты</h1>
            <p>Вы можете связаться с нами по электронной почте: example@example.com</p>
            <p>Или по телефону: +7 (123) 456-7890</p>
        </div>
        @include('layouts.footer')
    </body>
</html>
