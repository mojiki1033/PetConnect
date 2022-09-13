<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;
    
    //リレーション（⇔petsテーブル）
    public function pets()   
    {
        return $this->hasMany('App\Models\Pet');
    }
}