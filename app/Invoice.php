<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'or_number'
        ,'invoice_date'
        ,'supplier_id'
        ,'itemName'
        ,'price'
        ,'qty'
        ,'unit'
        ,'category'
        ,'total_price'
        ,'username'
        ,'created_at'
        ,'updated_at'
    ];
    public $timestamps = true;
}
