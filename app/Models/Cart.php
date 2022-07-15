<?php

namespace App\Models;

use App\Traits\SetAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory, SetAttribute;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'address',
        'note',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
