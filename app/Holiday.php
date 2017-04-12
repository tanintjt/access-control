<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{

    public $timestamps = false;

    protected $table = 'gov_holidays';


    protected $fillable = [
        'date','holiday','start_date','end_date','type','status'
    ];




}
