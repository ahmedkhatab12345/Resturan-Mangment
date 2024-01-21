<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Customer extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
}
