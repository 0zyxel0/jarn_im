<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $fillable = [
        'product_id'
        ,'name'
        ,'quantity'
        ,'category'
        ,'unit'
        ,'description'
        ,'created_by'
        ,'alert_value'
        ,'created_at'
        ,'updated_at'
    ];
    public $timestamps = true;
}
