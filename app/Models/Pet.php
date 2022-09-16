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
        'detail',
        'user_id',
    ];
    
    //リレーション（⇔statusesテーブル）
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    //リレーション（⇔sexesテーブル）
    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }
    
    //リレーション（⇔speciesテーブル）
    public function species()
    {
        return $this->belongsTo(Species::class);
    }
    
    //リレーション（⇔prefecturesテーブル）
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
    
    //リレーション（⇔usersテーブル）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //リレーション（⇔commentsテーブル）
    public function comments()   
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'desc')
        ->with('status:id,name', 'species:id,name', 'sex:id,name', 'prefecture:id,name')
        ->paginate($limit_count);
    }
}
