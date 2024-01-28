<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'number_of_people',
        'booking_datetime',
        'notes',
        'status',
        'customer_id',
    ];
    protected $guarded = [
        'booking_datetime'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
