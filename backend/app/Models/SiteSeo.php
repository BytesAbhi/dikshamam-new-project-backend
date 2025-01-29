<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_desc',
        'meta_keyword',
    ];
}
