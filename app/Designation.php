<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'deg';


    protected $primaryKey = 'deg_id';

    protected $fillable = [
        'deg_name','deg_des','co_id'

    ];
}
