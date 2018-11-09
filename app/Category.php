<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_id','name','updated_by','created_at','updated_at'];
    public $timestamps = true;
}
