<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table    = 'product_attributes';
    protected $fillable = [
        'name'
    ];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'product_attribute_id');
    }
}
