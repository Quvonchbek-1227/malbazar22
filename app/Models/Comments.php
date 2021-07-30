<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'text',
        'user_id',
        'animal_id',
        'created_at',
        'updated_at'
    ];
}
