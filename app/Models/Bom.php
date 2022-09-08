<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed bom_id
 * @property string name
 * @property string description
 * @property int price
 * @property int quantity
 * @property int category_id
 * @property int costs
 */
class Bom extends Model
{

    //status:1 enable,2 disabled,3 deleted'
    const STATUS_ENABLE = 1;
    const STATUS_DISABLED = 2;
    const STATUS_DELETED = 3;

    protected $primaryKey = 'bom_id';

    protected $table = 'bom';

    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image',
        'price', 'costs', 'quantity', 'main_img', 'main_img_thumb', 'length', 'width', 'height', 'category_id',
    ];

}
