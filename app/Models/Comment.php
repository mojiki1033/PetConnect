<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $fillable = [
        'content',
        'pet_id',
        'user_id',
    ];
    
    //リレーション（⇔petsテーブル）
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    
    //リレーション（⇔usersテーブル）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getByPet($pet)
    {
        return $this::whereBelongsTo($pet)->with('user')->orderBy('created_at', 'asc')->get();
    }
}
