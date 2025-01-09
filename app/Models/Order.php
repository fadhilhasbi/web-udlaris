<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function orderCustomItem()
    {
        return $this->hasMany(OrderCustomItem::class);
    }
    protected static function booted()
    {
        static::created(function ($order) {
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product && $product->on_pre_order) {
                    $product->decrement('pre_order_stock', $item->quantity);
                }
            }
        });
    }

    //Getter untuk kolom 'working_time'.
    public function getWorkingTimeAttribute($value)
    {
        return $value ?? 'Belum ditentukan'; // Nilai default jika null
    }
    //Setter untuk kolom 'working_time'.
    public function setWorkingTimeAttribute($value)
    {
        $this->attributes['working_time'] = ucwords($value); // Format nilai (opsional)
    }
}
