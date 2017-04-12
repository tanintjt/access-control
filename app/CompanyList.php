<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyList extends Model
{
    protected $table = 'company_list';


    //protected $primaryKey = 'co_id';

    protected $fillable = [
        'com_name','com_location','com_logo','com_soft'
    ];
}
