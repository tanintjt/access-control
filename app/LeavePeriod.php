<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavePeriod extends Model
{
    public $timestamps = false;

    protected $table = 'leave_period';


    protected $fillable = [
        'leave_period_start','leave_period_end','last_update'
    ];
}
