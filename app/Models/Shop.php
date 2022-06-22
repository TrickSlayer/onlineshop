<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'name',
        'user_id',
        'avatar',
        'background',
        'content',
        'active'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
