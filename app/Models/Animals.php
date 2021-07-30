<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'images',
        'price',
        'view',
        'telephone',
        'user_id',
        'category_id',
        'city_id',
        'telephone',
        'top'
    ];
}
