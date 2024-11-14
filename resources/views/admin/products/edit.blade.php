<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
         @csrf
         @method('PUT')
         <label for="name">Название:</label>
         <input type="text" name="name" id="name" value="{{ $product->name }}" required>
         <label for="description">Описание:</label>
         <textarea name="description" id="description" required>{{ $product->description }}</textarea>
         <label for="price">Цена:</label>
         <input type="number" name="price" id="price" value="{{ $product->price }}" required>
         <label for="image">Изображение:</label>
         <input type="file" name="image" id="image">
    <button type="submit">Обновить товар</button>
</form>