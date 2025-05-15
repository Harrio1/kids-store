<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно заполнять массово
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'size'
    ];

    /**
     * Получить заказ, к которому относится этот элемент
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Получить продукт, связанный с этим элементом
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Получить сумму элемента (цена * количество)
     */
    public function getSubtotal()
    {
        return $this->price * $this->quantity;
    }
} 