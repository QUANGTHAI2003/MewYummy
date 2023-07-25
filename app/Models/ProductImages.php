<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'id',
        'product_id',
        'image',
        'is_main',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
