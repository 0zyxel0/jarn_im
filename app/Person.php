<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $primaryKey = 'partyid';
    protected $table = 'people';
    protected $fillable = ['partyid','areaid','givenname','familyname','contactNumber','updatedBy','createdBy'];
    public $timestamps = true;
}
