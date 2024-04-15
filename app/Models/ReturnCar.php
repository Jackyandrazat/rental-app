<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'return_date',
        'rental_day',
        'rental_rate_per_day',
        'total_rental_cost',
    ];

    protected $dates = ['return_date'];
    // Relasi dengan model mobil (Car)
 
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    
}
