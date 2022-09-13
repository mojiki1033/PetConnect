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
    
    //リレーション（⇔statusesテーブル）
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    
    //リレーション（⇔sexesテーブル）
    public function sex()
    {
        return $this->belongsTo('App\Models\Sex');
    }
    
    //リレーション（⇔speciesテーブル）
    public function species()
    {
        return $this->belongsTo('App\Models\Species');
    }
    
    //リレーション（⇔prefecturesテーブル）
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture');
    }
    
    //リレーション（⇔usersテーブル）
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
