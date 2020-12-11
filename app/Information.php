<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $primaryKey = "id";
    protected $table='crudtable';
    protected $fillable = [
        'fname', 'lname', 'age','address'
    ];
}
