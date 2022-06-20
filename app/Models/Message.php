<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'group_chat_id',
        'user_id',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
