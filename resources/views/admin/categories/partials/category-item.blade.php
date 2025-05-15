<div class="category-item category-level-{{ $level }}">
    <div class="category-content">
        <div class="category-info">
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-image">
            @endif
            <div class="category-details">
                <h4 class="category-name">{{ $category->name }}</h4>
                <div class="category-meta">
                    <span class="badge badge-secondary">{{ $category->slug }}</span>
                    @if($category->is_active)
                        <span class="badge badge-success">Активна</span>
                    @else
                        <span class="badge badge-danger">Неактивна</span>
                    @endif
                    <span class="badge badge-info">Порядок: {{ $category->sort_order }}</span>
                </div>
            </div>
        </div>
        
        <div class="category-actions">
            <a href="{{ route('category.view', $category->slug) }}" class="btn btn-sm btn-info" target="_blank" title="Просмотр">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary" title="Редактировать">
                <i class="fas fa-edit"></i>
            </a>
            <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}" class="btn btn-sm btn-success" title="Добавить подкатегорию">
                <i class="fas fa-plus"></i>
            </a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="delete-category-form d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Удалить">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    
    @if($category->children->count() > 0)
        <div class="category-children">
            @foreach($category->children->sortBy('sort_order') as $child)
                @include('admin.categories.partials.category-item', ['category' => $child, 'level' => $level + 1])
            @endforeach
        </div>
    @endif
</div> 