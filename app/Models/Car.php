<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable =[
        'brand','model','license_plate','rental_rate_per_day'
    ];

    protected $table = 'cars';

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
