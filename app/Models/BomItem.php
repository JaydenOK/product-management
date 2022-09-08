<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BomItem extends Model
{
    protected $table = 'bom_item';

    protected $fillable = [
        'bom_id', 'child_bom_id', 'child_bom_quantity'
    ];

    public function bom()
    {
        return $this->hasMany(Bom::class);
    }

}
