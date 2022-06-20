<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory,Sortable;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'content',
        'active',
        'thumb',
    ];

    public $sortable = ['id', 'name', 'description', 'active'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
