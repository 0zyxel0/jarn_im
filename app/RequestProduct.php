<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    protected $primaryKey = 'requestid';
    protected $table = 'request_list_products';
    protected $fillable = ['requestid','tracking_no','name','qty','remarks','requested_by','status','released_by'];
    public $timestamps = true;
}
