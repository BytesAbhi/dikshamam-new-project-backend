<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightBooking extends Model {
    use HasFactory;

    protected $table = 'flight_bookings';

    protected $fillable = ['name', 'email', 'mobile', 'message', 'added_on'];
}
