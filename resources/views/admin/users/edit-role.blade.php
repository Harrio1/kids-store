@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Изменение роли пользователя</h1>
            <p class="text-muted">Изменение роли пользователя "{{ $user->name }}"</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Вернуться к списку пользователей
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Данные пользователя
                </div>
                <div class="card-body">
                    <div class="user-info mb-4">
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Имя:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
                        <p>
                            <strong>Текущая роль:</strong> 
                            @if($user->role === 'admin')
                                <span class="badge badge-danger">Администратор</span>
                            @else
                                <span class="badge badge-secondary">Пользователь</span>
                            @endif
                        </p>
                    </div>
                    
                    <form action="{{ route('admin.users.update-role', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="role">Выберите роль:</label>
                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Пользователь</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Администратор</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong>Внимание!</strong> Изменение роли пользователя влияет на его права доступа в системе.
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Сохранить изменения
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 