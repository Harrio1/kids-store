<div class="sidebar-categories">
    <h2 class="sidebar-title p-3 mb-0">Категории</h2>
    
    <div class="category-sections">
        <!-- Раздел для мальчиков -->
        <div class="category-section">
            <h3 class="category-section-title bg-primary text-white p-2">Для мальчиков</h3>
            <ul class="list-group category-items">
                @foreach($boyCategories as $category)
                    <li class="list-group-item category-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('category.view', $category->slug) }}" class="category-link">
                            {{ $category->name }}
                        </a>
                        <span class="badge badge-primary">{{ $category->products_count }}</span>
                        
                        @if($category->children->count() > 0)
                            <ul class="subcategory-list">
                                @foreach($category->children as $subcategory)
                                    <li class="subcategory-item">
                                        <a href="{{ route('category.view', $subcategory->slug) }}" class="subcategory-link">
                                            {{ $subcategory->name }}
                                        </a>
                                        <span class="badge badge-secondary">{{ $subcategory->products_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        
        <!-- Раздел для девочек -->
        <div class="category-section">
            <h3 class="category-section-title bg-danger text-white p-2">Для девочек</h3>
            <ul class="list-group category-items">
                @foreach($girlCategories as $category)
                    <li class="list-group-item category-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('category.view', $category->slug) }}" class="category-link">
                            {{ $category->name }}
                        </a>
                        <span class="badge badge-danger">{{ $category->products_count }}</span>
                        
                        @if($category->children->count() > 0)
                            <ul class="subcategory-list">
                                @foreach($category->children as $subcategory)
                                    <li class="subcategory-item">
                                        <a href="{{ route('category.view', $subcategory->slug) }}" class="subcategory-link">
                                            {{ $subcategory->name }}
                                        </a>
                                        <span class="badge badge-secondary">{{ $subcategory->products_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        
        <!-- Раздел для новорожденных -->
        <div class="category-section">
            <h3 class="category-section-title bg-info text-white p-2">Для новорожденных</h3>
            <ul class="list-group category-items">
                @foreach($babyCategories as $category)
                    <li class="list-group-item category-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('category.view', $category->slug) }}" class="category-link">
                            {{ $category->name }}
                        </a>
                        <span class="badge badge-info">{{ $category->products_count }}</span>
                        
                        @if($category->children->count() > 0)
                            <ul class="subcategory-list">
                                @foreach($category->children as $subcategory)
                                    <li class="subcategory-item">
                                        <a href="{{ route('category.view', $subcategory->slug) }}" class="subcategory-link">
                                            {{ $subcategory->name }}
                                        </a>
                                        <span class="badge badge-secondary">{{ $subcategory->products_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<style>
    .sidebar-categories {
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    
    .category-section {
        margin-bottom: 15px;
    }
    
    .category-section-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }
    
    .category-items {
        padding-left: 0;
        margin-bottom: 0;
    }
    
    .category-item {
        border-left: none;
        border-right: none;
    }
    
    .category-link {
        text-decoration: none;
        color: inherit;
        font-weight: 500;
    }
    
    .subcategory-list {
        list-style: none;
        padding-left: 20px;
        margin-top: 5px;
        width: 100%;
    }
    
    .subcategory-item {
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .subcategory-link {
        text-decoration: none;
        color: inherit;
        font-size: 14px;
    }
    
    /* Стили для темной темы */
    [data-theme="dark"] .sidebar-categories {
        border-color: #444;
        background-color: #2d3436;
    }
    
    [data-theme="dark"] .category-item {
        background-color: #2d3436;
        border-color: #444;
    }
    
    [data-theme="dark"] .category-link,
    [data-theme="dark"] .subcategory-link {
        color: #f0f0f0;
    }
</style> 