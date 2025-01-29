<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'btn1_txt',
        'btn1_link',
        'btn2_txt',
        'btn2_link',
        'slide_order',
        'image',
        'status'
    ];
}
