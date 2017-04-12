<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Department;
use App\Designation;
use App\EmployeeData;
use App\Holiday;
use App\LeavePeriod;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AccessControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attendance()
    {
        $pageTitle = 'Attendance';

        $employee_data = [''=>'Select Name'] + EmployeeData::lists('card_name','default_id')->all();

        /*$model = DB::table('attendance')
            ->join('employee_data', 'employee_data.card_number', '=', 'attendance.card_number')
            ->where('role.title', '!=', 'super-admin')
            ->select('permission_role.id', 'permissions.title as p_title', 'role.title as r_title')
            ->paginate(30);*/


        //$model = Attendance::paginate(30);
        $model = "SELECT employee_data.id_card, employee_data.card_name, employee_data.company,employee_data.duty_time,employee_data.exit_time,attendance.log_time
FROM attendance
INNER JOIN employee_data ON attendance.card_number=employee_data.card_number";


        return view('attendance.index',['pageTitle'=>$pageTitle,'model'=>$model,'employee_data'=>$employee_data]);
    }



    public function department()
    {
        $pageTitle = 'Department';

        $model = Department::paginate(30);

        return view('dept.index',['pageTitle'=>$pageTitle,'model'=>$model]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDept(Requests\DepartmentRequest $request)
    {
        $input = $request->all();

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Department::create($input);
            DB::commit();
            Session::flash('message', 'Successfully Added!!!! ');

        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('error', "Not added.Invalid Request!");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDept($id)
    {
        $pageTitle = 'Department';

        $data = Department::findOrFail($id);

        return view('dept.update',['pageTitle'=>$pageTitle,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $model = Department::findOrFail($id);
        $data = $request->all();

        DB::beginTransaction();
        try {
            $model->fill($data)->save();
            DB::commit();
            Session::flash('message', "Successfully  Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', " Not added.Invalid Request!");
        }
        return redirect()->back();
    }



    public function designation()
    {
        $pageTitle = 'Designation';

        $model = Designation::paginate(30);

        return view('deg.index',['pageTitle'=>$pageTitle,'model'=>$model]);

    }

    public function storeDeg(Request $request)
    {
        $input = $request->all();
        //print_r($input);exit;
        /* Transaction Start Here */
        DB::beginTransaction();
        try {

            Designation::create($input);
            DB::commit();
            Session::flash('message', 'Successfully Added!!!!  ');

        }catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('error',$e->getMessage());
        }
        return redirect()->back();
    }



    public function editDeg($id)
    {
        $pageTitle = 'Designation';
        $data = Designation::findOrFail($id);

        return view('deg.update',['pageTitle'=>$pageTitle,'data'=>$data]);
    }

    public function updateDeg(Request $request, $id)
    {

        $model = Designation::findOrFail($id);
        $data = $request->all();
        DB::beginTransaction();
        try {
            $model->fill($data)->save();
            DB::commit();
            Session::flash('message', "Successfully  Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', " Not added.Invalid Request!");
        }
        return redirect()->back();
    }

    public function gov_holidays()
    {
        $pageTitle = 'Government Approved Holidays For Year';

        $leave_period = DB::table('leave_period')->first();
        $leave_period_start = $leave_period->leave_period_start;
        $leave_period_end = $leave_period->leave_period_end;


        $model = DB::select("select distinct holiday,start_date,end_date,type,status,id from gov_holidays 
                 where  status in('0','1') and ((start_date>='$leave_period_start') AND (end_date<='$leave_period_end')) or (type=1) order by date ASC");

        return view('holiday.index',['pageTitle'=>$pageTitle,
                                     'model'=>$model,
                                     'leave_period_start'=>$leave_period_start,
                                     'leave_period_end'=>$leave_period_end]);

    }

    public function gov_holidays_store(Requests\HolidayRequest $request)
    {
        $input = $request->all();

            /* Transaction Start Here */
            DB::beginTransaction();
            try {

                Holiday::create($input);
                DB::commit();
                Session::flash('message', 'Successfully Added!!!!');

            }catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                Session::flash('error',$e->getMessage());
            }

        return redirect()->back();
    }

    public function gov_holidays_edit($id)
    {
        $pageTitle = 'Government Approved Holidays For Year';
        $data = Holiday::findOrFail($id);

        return view('holiday.update',['pageTitle'=>$pageTitle,'data'=>$data]);
    }


    public function gov_holidays_update(Request $request, $id)
    {

        $model = Holiday::findOrFail($id);
        $data = $request->all();
        DB::beginTransaction();
        try {
            $model->fill($data)->save();
            DB::commit();
            Session::flash('message', "Successfully  Updated");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', " Not added.Invalid Request!");
        }
        return redirect()->back();
    }


    /*--------------------------------Employee Data --------------------------------*/

    public function employee()
    {
        $pageTitle = 'Employee Information';

        $model = DB::select(DB::raw("SELECT  en.`card_number`,en.`card_name` As employee_name,en.`card_name` As line_manager,en.join_date,en.duty_station,en.status,company_list.com_name,dept.dept_name
               FROM `employee_data` as en 
               join company_list on en.`company`=company_list.co_id
               left join dept on en.`card_dept`=dept.dept_id
               where  en.`line_manager`='0'
               
               UNION
               
               SELECT  en.`card_number`,en.`card_name` As employee_name,en2.`card_name` As line_manager,en.join_date,en.duty_station,en.status,company_list.com_name,dept.dept_name
               FROM `employee_data` as en 
               inner join employee_data as en2 
               on en.`line_manager`=en2.card_number
               join company_list on en.`company`=company_list.co_id
               join dept on en.`card_dept`=dept.dept_id
               WHERE en.status in (0,1)"));
        
        return view('employee.index',['pageTitle'=>$pageTitle,'model'=>$model]);

    }

}
