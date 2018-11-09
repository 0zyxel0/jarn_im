<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestList extends Model
{
    protected $primaryKey = 'listid';
    protected $table = 'request_lists';
    protected $fillable = ['request_productid','tracking_no','remarks','requested_by','status','released_by'];
    public $timestamps = true;
}
