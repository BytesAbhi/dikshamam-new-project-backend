<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'check_in_date',
        'check_out_date',
        'category',
        'adults',
        'children',
        'tour_id',
        'read_status',
    ];

    // Define the relationship with TourPackage model
    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class, 'tour_id');
    }
}
