<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
