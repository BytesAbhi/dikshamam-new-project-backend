<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model {
    use HasFactory;

    protected $table = 'tour_packages';

    protected $fillable = [
        'tour_cat_id', 'destination_id', 'tour_type', 'tour_code', 'name', 'slug', 
        'nights', 'days', 'itinerary', 'inclusions', 'exclusions', 'price', 
        'image', 'is_featured', 'meta_title', 'meta_desc', 'meta_keyword', 'status'
    ];

    public function category() {
        return $this->belongsTo(TourCategory::class, 'tour_cat_id');
    }

    public function destination() {
        return $this->belongsTo(HotelDestination::class, 'destination_id');
    }

    public function type() {
        return $this->belongsTo(TourType::class, 'tour_type');
    }
}
