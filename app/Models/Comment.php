<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Comment extends Model
{
    use HasFactory, Sortable;
    
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'star',
        'thumb',
    ];

    public $sortable = ['star'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
