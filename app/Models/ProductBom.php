<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBom extends Model
{
    protected $table = 'product_bom';

    protected $fillable = [
        'title', 'description', 'image', 'sku',
        'price', 'quantity', 'main_img', 'main_img_thumb', 'length', 'width', 'height', 'category_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function bom()
    {
        return $this->hasOne(Bom::class);
    }

}
