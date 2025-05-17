@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>Создание новой категории</h2>
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
                            <label for="category_type">Тип категории</label>
                            <select name="category_type" id="category_type" class="form-control" required>
                                <option value="">-- Выберите тип категории --</option>
                                <option value="boys" {{ old('category_type') == 'boys' ? 'selected' : '' }}>Для мальчиков</option>
                                <option value="girls" {{ old('category_type') == 'girls' ? 'selected' : '' }}>Для девочек</option>
                                <option value="babies" {{ old('category_type') == 'babies' ? 'selected' : '' }}>Для новорожденных</option>
                            </select>
                            <small class="form-text text-muted">Выберите к какому разделу относится категория.</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="parent_id">Родительская категория</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Нет (корневая категория)</option>
                                <optgroup label="Для мальчиков" id="boys-categories" class="category-group">
                                    @foreach($boyCategoriesForSelect ?? [] as $category)
                                        <option value="{{ $category->id }}" {{ request('parent_id') == $category->id ? 'selected' : '' }}>
                                            {{ str_repeat('— ', $category->level) }}{{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Для девочек" id="girls-categories" class="category-group">
                                    @foreach($girlCategoriesForSelect ?? [] as $category)
                                        <option value="{{ $category->id }}" {{ request('parent_id') == $category->id ? 'selected' : '' }}>
                                            {{ str_repeat('— ', $category->level) }}{{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Для новорожденных" id="babies-categories" class="category-group">
                                    @foreach($babyCategoriesForSelect ?? [] as $category)
                                        <option value="{{ $category->id }}" {{ request('parent_id') == $category->id ? 'selected' : '' }}>
                                            {{ str_repeat('— ', $category->level) }}{{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            <small class="form-text text-muted">Оставьте пустым, если это корневая категория.</small>
                            @error('parent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Название категории</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug') }}" required>
                            <small class="form-text text-muted">URL-адрес категории (только латинские буквы, цифры и дефисы).</small>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                                   id="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Порядок сортировки</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                            @error('sort_order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" 
                                       name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">Активна</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Создать категорию</button>
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
document.addEventListener('DOMContentLoaded', function() {
    // Автоматическая генерация slug из названия
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const typeSelect = document.getElementById('category_type');
    const parentSelect = document.getElementById('parent_id');
    
    // Функция для транслитерации кириллицы в латиницу
    function transliterate(text) {
        const ru = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
            'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
            'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts',
            'ч': 'ch', 'ш': 'sh', 'щ': 'sch', 'ы': 'y', 'э': 'e', 'ю': 'yu', 'я': 'ya',
            ' ': '-', '_': '-', ',': '-', '.': '-', '!': '-', '?': '-'
        };

        text = text.toLowerCase();
        let result = '';
        
        for (let i = 0; i < text.length; i++) {
            const char = text[i];
            result += ru[char] || char;
        }
        
        // Удаляем все символы, кроме латинских букв, цифр и дефисов
        result = result.replace(/[^a-z0-9-]/g, '');
        
        // Удаляем дефисы в начале и конце
        result = result.replace(/^-+|-+$/g, '');
        
        return result;
    }
    
    nameInput.addEventListener('input', function() {
        if (!slugInput.value) {
            slugInput.value = transliterate(this.value);
        }
    });
    
    // Фильтрация родительских категорий в зависимости от выбранного типа
    typeSelect.addEventListener('change', function() {
        const selectedType = this.value;
        
        // Скрываем все группы категорий
        const categoryGroups = document.querySelectorAll('.category-group');
        categoryGroups.forEach(group => {
            group.style.display = 'none';
        });
        
        // Показываем группу, соответствующую выбранному типу
        if (selectedType === 'boys') {
            document.getElementById('boys-categories').style.display = 'block';
        } else if (selectedType === 'girls') {
            document.getElementById('girls-categories').style.display = 'block';
        } else if (selectedType === 'babies') {
            document.getElementById('babies-categories').style.display = 'block';
        }
        
        // Сбрасываем выбранную родительскую категорию
        parentSelect.value = '';
    });
    
    // Инициализация при загрузке страницы
    typeSelect.dispatchEvent(new Event('change'));
});
</script>
@endsection 