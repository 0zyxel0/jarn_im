<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory_transaction_log extends Model
{
    protected $table = 'inventory_transaction_log';
    protected $fillable = [
        'product_id'
        ,'name'
        ,'quantity'
        ,'category'
        ,'unit'
        ,'price'
        ,'description'
        ,'created_by'
        ,'alert_value'
        ,'processValue'
        ,'created_at'
        ,'updated_at'
    ];
    public $timestamps = true;
}
