<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model {
    use HasFactory;

    protected $table = 'car_bookings';

    protected $fillable = ['name', 'email', 'mobile', 'message', 'car', 'added_on'];
}
