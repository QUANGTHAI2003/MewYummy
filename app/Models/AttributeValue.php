<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';

    protected $fillable = [
        'product_attribute_id',
        'product_attribute_value',
        'product_attribute_price',
        'product_attribute_sale_price',
        'product_attribute_quantity',
        'product_id'
    ];

}
