@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Управление категориями</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Добавить новую категорию
            </a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <div class="category-tree">
                @forelse($categories as $category)
                    @include('admin.categories.partials.category-item', ['category' => $category, 'level' => 1])
                @empty
                    <div class="no-categories">
                        <p>Категории не найдены</p>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Создать первую категорию
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Обработка подтверждения удаления
    const deleteForms = document.querySelectorAll('.delete-category-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Вы уверены, что хотите удалить эту категорию? Все подкатегории также будут удалены.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endsection 