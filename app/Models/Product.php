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
        'description',
        'created_at',
        'updated_at',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product_images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function attributeValues() {
        return $this->hasMany(AttributeValue::class, 'product_id');
    }
}
