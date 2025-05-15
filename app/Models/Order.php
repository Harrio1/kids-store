<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Поля, которые можно заполнять массово
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'status',
        'total',
        'payment_method',
        'notes'
    ];

    /**
     * Статусы заказа
     */
    const STATUS_NEW = 'new';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    /**
     * Получить все товары в заказе
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Получить названия статусов
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_PROCESSING => 'В обработке',
            self::STATUS_COMPLETED => 'Выполнен',
            self::STATUS_CANCELLED => 'Отменен'
        ];
    }

    /**
     * Получить текстовое представление статуса
     */
    public function getStatusText()
    {
        $statuses = self::getStatusList();
        return $statuses[$this->status] ?? 'Неизвестный статус';
    }
} 