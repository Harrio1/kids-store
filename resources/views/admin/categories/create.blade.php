@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Добавление новой категории</h2>
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
                    
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название категории</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="slug">URL-адрес (slug)</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Оставьте пустым для автоматического создания">
                            <small class="form-text text-muted">Используйте только латинские буквы, цифры и дефисы. Например: "clothes-for-boys"</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Описание категории</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="parent_id">Родительская категория</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="">-- Корневая категория --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Изображение категории</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                        
                        <div class="form-group">
                            <label for="sort_order">Порядок сортировки</label>
                            <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}">
                            <small class="form-text text-muted">Категории с меньшим значением будут отображаться выше</small>
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Активная категория</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить категорию</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Автоматическое создание slug из названия
    document.getElementById('name').addEventListener('input', function() {
        var nameField = this;
        var slugField = document.getElementById('slug');
        
        // Только если поле slug пустое, предлагаем автоматическое заполнение
        if (slugField.value === '') {
            // Преобразуем кириллицу в латиницу (простая транслитерация)
            var text = nameField.value.toLowerCase();
            var translator = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
                'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts',
                'ч': 'ch', 'ш': 'sh', 'щ': 'sch', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu',
                'я': 'ya', ' ': '-', '_': '-', ',': '-', '.': '-', '!': '-', '?': '-'
            };
            
            for (var char in translator) {
                text = text.split(char).join(translator[char]);
            }
            
            // Удаляем все символы, кроме букв, цифр и дефисов
            slugField.value = text.replace(/[^a-z0-9-]/g, '');
        }
    });
</script>
@endsection 