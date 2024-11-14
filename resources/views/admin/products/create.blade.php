<form action="{{ route('admin.products.store') }}" method="POST">
         @csrf
         <label for="name">Название:</label>
         <input type="text" name="name" id="name" required>
         <label for="description">Описание:</label>
         <textarea name="description" id="description" required></textarea>
         <label for="price">Цена:</label>
         <input type="number" name="price" id="price" required>
         <label for="image">Изображение:</label>
         <input type="file" name="image" id="image">
    <button type="submit">Добавить товар</button>
</form>