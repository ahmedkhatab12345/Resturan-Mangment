<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'address',
        'phone_number',
        'status',
        'delivery_date',
        'notes',
        'customer_id',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
