@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Редактирование товара</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Название товара</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Описание товара</label>
                            <textarea class="form-control" name="description" id="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="category_id">Категория (новый формат)</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Выберите категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Выберите категорию из новой структуры категорий</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Базовая категория (совместимость)</label>
                            <select class="form-control" name="category" id="category">
                                <option value="">Выберите категорию</option>
                                <option value="boys" {{ old('category', $product->category) == 'boys' ? 'selected' : '' }}>Для мальчиков</option>
                                <option value="girls" {{ old('category', $product->category) == 'girls' ? 'selected' : '' }}>Для девочек</option>
                                <option value="newborns" {{ old('category', $product->category) == 'newborns' ? 'selected' : '' }}>Для новорожденных</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="sku">Артикул (SKU)</label>
                            <input type="text" class="form-control" name="sku" id="sku" value="{{ old('sku', $product->sku) }}">
                            <small class="form-text text-muted">Автоматически сгенерированный или ручной артикул товара. Формат: [КАТЕГОРИЯ]-[СЛУЧАЙНЫЙ КОД]-[НОМЕР]</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Обычная цена (в рублях)</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="sale_price">Акционная цена (в рублях)</label>
                            <input type="number" class="form-control" name="sale_price" id="sale_price" value="{{ old('sale_price', $product->sale_price) }}" step="0.01">
                            <small class="form-text text-muted">Оставьте пустым, если товар не по акции</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="stock">Количество на складе</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Основное изображение товара</label>
                            @if($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px;">
                                    <p class="text-muted mt-1">Текущее изображение</p>
                                </div>
                            @endif
                            <input type="file" class="form-control-file" name="image" id="image">
                            <small class="form-text text-muted">Оставьте пустым, чтобы сохранить текущее изображение</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="gallery">Галерея изображений (можно выбрать несколько)</label>
                            @if($product->gallery && count($product->gallery) > 0)
                                <div class="mb-2 row">
                                    @foreach($product->gallery as $image)
                                        <div class="col-md-3 col-sm-4 mb-2">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Gallery image" class="img-thumbnail" style="max-width: 100%; max-height: 150px;">
                                        </div>
                                    @endforeach
                                </div>
                                <p class="text-muted">Текущие изображения галереи. При загрузке новых изображений, старые будут заменены.</p>
                            @endif
                            <input type="file" class="form-control-file" name="gallery[]" id="gallery" multiple>
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featured">Показывать на главной странице</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Активный товар</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Обновить товар</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection