<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'title', 'description', 'image', 'sku',
        'price', 'quantity', 'main_img', 'main_img_thumb', 'length', 'width', 'height', 'category_id',
    ];

    /**
     * one-to-many relationship  product_id -> bom_id
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productBoms()
    {
        return $this->hasMany(ProductBom::class);
    }

}
