<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $table = 'hotel_bookings';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'check_in_date',
        'check_out_date',
        'adults',
        'children',
        'destination',
        'stay_type',
        'added_on',
        'read_status'
    ];

    public function destination()
    {
        return $this->belongsTo(HotelDestination::class, 'destination');
    }
}
