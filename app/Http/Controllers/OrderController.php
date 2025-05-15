<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['checkout', 'process', 'success']);
        $this->middleware('admin')->only(['index', 'show', 'updateStatus']);
    }
    
    /**
     * Отображение списка заказов для админ-панели
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
    
    /**
     * Отображение конкретного заказа для админ-панели
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
    
    /**
     * Отображение списка заказов для обычного пользователя
     */
    public function userOrders()
    {
        $orders = Order::where('email', Auth::user()->email)
                       ->latest()
                       ->paginate(10);
        
        return view('account.orders.index', compact('orders'));
    }
    
    /**
     * Отображение конкретного заказа для обычного пользователя
     */
    public function userOrderDetail(Order $order)
    {
        // Security check - ensure user can only see their own orders
        if ($order->email !== Auth::user()->email) {
            return redirect()->route('account.orders')
                             ->with('error', 'У вас нет доступа к просмотру этого заказа');
        }
        
        return view('account.orders.show', compact('order'));
    }
    
    /**
     * Обновление статуса заказа из админ-панели
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Order::getStatusList()))
        ]);
        
        $order->status = $request->status;
        $order->save();
        
        return redirect()->route('admin.orders.show', $order)
                         ->with('success', 'Статус заказа успешно обновлен');
    }
    
    /**
     * Отображение формы оформления заказа
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }
        
        $total = 0;
        $products = [];
        
        foreach ($cart as $cartKey => $details) {
            $product = Product::find($details['product_id']);
            if ($product) {
                $products[$cartKey] = $product;
                $total += $details['price'] * $details['quantity'];
            }
        }
        
        return view('checkout.index', compact('cart', 'products', 'total'));
    }
    
    /**
     * Обработка заказа
     */
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|in:cash,card',
            'notes' => 'nullable|string'
        ]);
        
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Корзина пуста');
        }
        
        // Подсчитываем общую сумму заказа
        $total = 0;
        foreach ($cart as $details) {
            $product = Product::find($details['product_id']);
            if ($product) {
                $total += $details['price'] * $details['quantity'];
            }
        }
        
        // Создаем заказ
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'total' => $total,
            'status' => Order::STATUS_NEW
        ]);
        
        // Создаем элементы заказа
        foreach ($cart as $details) {
            $product = Product::find($details['product_id']);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $details['quantity'],
                    'size' => $details['size']
                ]);
            }
        }
        
        // Очищаем корзину
        session()->forget('cart');
        
        return redirect()->route('order.success', $order)
                         ->with('success', 'Заказ успешно оформлен');
    }
    
    /**
     * Страница успешного оформления заказа
     */
    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
} 