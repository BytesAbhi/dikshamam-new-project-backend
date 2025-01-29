<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_cat_id',
        'destination_id',
        'tour_type',
        'tour_code',
        'name',
        'slug',
        'nights',
        'days',
        'itinerary',
        'inclusions',
        'exclusions',
        'price',
        'image',
        'is_featured',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'status',
    ];

    // Relationship to TourCategory
    public function tourCategory()
    {
        return $this->belongsTo(TourCategory::class, 'tour_cat_id');
    }

    // Relationship to Destination
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    // Relationship to TourType
    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type');
    }
}
