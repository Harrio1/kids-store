<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Отображение всех товаров
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Форма для создания нового товара
    public function create()
    {
        return view('admin.products.create');
    }

    // Сохранение нового товара
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно добавлен.');
    }

    // Форма для редактирования товара
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Обновление товара
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно обновлён.');
    }

    // Удаление товара
    public function destroy(Product $product)
    {
        $product->delete();
        $products = Product::paginate(10);
        

        return redirect()->route('admin.products.index')
                         ->with('success', 'Товар успешно удалён.');
    }
}
