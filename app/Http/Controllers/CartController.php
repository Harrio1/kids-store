<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Отображение корзины
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        // Получаем продукты и вычисляем сумму
        $products = [];
        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $products[$id] = $product;
                $total += $details['price'] * $details['quantity'];
            }
        }
        
        return view('cart.index', compact('cart', 'products', 'total'));
    }
    
    /**
     * Добавление товара в корзину
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
            'size' => 'required'
        ]);
        
        $cart = session()->get('cart', []);
        
        // Уникальный ключ для продукта (с учетом размера)
        $cartKey = $product->id . '-' . $request->size;
        
        // Если продукт уже в корзине - увеличиваем количество
        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $request->quantity;
        } else {
            // Иначе добавляем новый продукт
            $cart[$cartKey] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'image' => $product->image
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->route('cart.index')->with('success', 'Товар добавлен в корзину');
    }
    
    /**
     * Обновление корзины
     */
    public function update(Request $request)
    {
        if ($request->has('items') && is_array($request->items)) {
            $cart = session()->get('cart', []);
            
            foreach ($request->items as $cartKey => $quantity) {
                if (isset($cart[$cartKey])) {
                    $cart[$cartKey]['quantity'] = max(1, min(10, (int)$quantity));
                }
            }
            
            session()->put('cart', $cart);
            
            return redirect()->route('cart.index')->with('success', 'Корзина обновлена');
        }
        
        return redirect()->route('cart.index');
    }
    
    /**
     * Удаление товара из корзины
     */
    public function remove($cartKey)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Товар удален из корзины');
    }
    
    /**
     * Очистка корзины
     */
    public function clear()
    {
        session()->forget('cart');
        
        return redirect()->route('cart.index')->with('success', 'Корзина очищена');
    }
} 