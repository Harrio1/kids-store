<!DOCTYPE html>
   <html lang="ru">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
       <title>Витрина детского магазина</title>
   </head>
   <body>
       <h1>Товары</h1>
       <ul>
           @foreach($products as $product)
               <li>
                   <h2 >{{ $product->name }}</h2>
                   <p>{{ $product->description }}</p>
                   <p>Цена: {{ $product->price }} руб.</p>
               </li>
           @endforeach
       </ul>
   </body>
   </html>
 