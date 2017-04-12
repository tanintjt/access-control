<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'dept';


    protected $primaryKey = 'dept_id';

    protected $fillable = [
      'dept_name','dept_des','co_id'
    ];

    public static function getDeptName(){

        $data = Department::lists('dept_name','dept_id');
        return $data;
    }
}





