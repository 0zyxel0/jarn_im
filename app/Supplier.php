<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'suppliers';
    protected $fillable = ['company_name','contact_person','contact_number','updated_by','created_at','updated_at'];
    public $timestamps = true;
}
