<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model {
    use HasFactory;

    protected $table = 'tour_categories';

    protected $fillable = ['category'];

    public function tourPackages() {
        return $this->hasMany(TourPackage::class, 'tour_cat_id');
    }
}
