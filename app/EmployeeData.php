<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class EmployeeData extends Model implements AuthenticatableContract,
                                            AuthorizableContract,
                                            CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'employee_data';



    protected $fillable = [
        'card_number',
        'card_name',
        'company',
        'card_dept',
        'desig',
        'duty_station',
        'id_card',
        'user_access',
        'line_manager',
        'email',
        'join_date',
        'password',
        'status',
        'employee_type',
        'duty_time',
        'exit_time',
        'block',
        'send_to_hr',
    ];

    protected $hidden = ['password', 'remember_token'];


    public function relCompany(){
        return  $this->belongsTo('App\CompanyList','company','co_id');
    }

    public function relDept(){
        return  $this->belongsTo('App\Department','card_dept','dept_id');
    }



   /* public function relCompany()
    {
        return $this->belongsTo('App\CompanyList', 'company', 'default_id');
    }*/

   /* public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }*/


}
