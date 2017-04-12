<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';



    protected $fillable = [
        'card_number',
        'log_time',
    ];
}
