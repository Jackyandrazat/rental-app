<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'status',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function car()
    {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }

    public function return()
    {
        return $this->hasOne(ReturnCar::class);
    }

   
    // public function durationInDays()
    // {
    //     return $this->start_date->diffInDays($this->end_date);
    // }

    
    // public function totalCost()
    // {
    //     return $this->car->rental_rate_per_day * $this->durationInDays();
    // }
}
