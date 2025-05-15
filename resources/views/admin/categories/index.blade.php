@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1>Управление категориями</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Добавить новую категорию</a>
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Slug</th>
                            <th>Родительская категория</th>
                            <th>Порядок сортировки</th>
                            <th>Статус</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 50px; max-height: 50px;">
                                    @else
                                        <span class="text-muted">Нет изображения</span>
                                    @endif
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if($category->parent)
                                        <span class="badge badge-info">{{ $category->parent->name }}</span>
                                    @else
                                        <span class="badge badge-secondary">Корневая категория</span>
                                    @endif
                                </td>
                                <td>{{ $category->sort_order }}</td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge badge-success">Активна</span>
                                    @else
                                        <span class="badge badge-danger">Неактивна</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('category.view', $category->slug) }}" class="btn btn-sm btn-info" target="_blank">Просмотр</a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию? Все подкатегории также будут удалены.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Категории не найдены</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection 