<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        'status_id',
        'title',
        'sex_id',
        'age',
        'species_id',
        'breed',
        'prefecture_id',
        'delivery_area',
        'body',
        'user_id',
    ];
}
