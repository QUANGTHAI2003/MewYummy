<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    use HasFactory;

    // use DateScopes;

    protected $table = "products";

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'regular_price',
        'sale_price',
        'stock_qty',
        'is_active',
        'thumbnail',
        'description',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
