<?php

namespace App\Models;

use App\Traits\SetAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable, SoftDeletes, SetAttribute;

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'shop_id',
        'quantity',
        'name',
        'price',
        'sale_price',
        'description',
        'content',
        'active',
        'thumb',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
