<?php

// app\Models\Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name', 'address', 'phone_number', 'notes', 'total_price', 'items'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_order')->withPivot('quantity', 'price');
    }
}
