<?php

namespace App\Http\Controllers\Auth;
use App\EmployeeData;
use App\User;
use App\UserActivity;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use URL;
use HTML;
use Mockery\CountValidator\Exception;
use Validator;
use Input;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            #'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            # 'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /*password reset before login by inactive user*/
    public function reset_password($user_id){

        return view('user::reset_password._form',['user_id'=>$user_id]);
    }

    public function update_new_password(Request $request){

        $input = $request->all();

        date_default_timezone_set("Asia/Dacca");

        if($input['confirm_password']==$input['password']) {

            $model = User::findOrFail($request['user_id']);
            $model->password = Hash::make($input['password']);
            $model->last_visit = date('Y-m-d h:i:s', time());
            /* Transaction Start Here */
            DB::beginTransaction();
            try {
                $model->save();
                DB::commit();

                Auth::logout();
                Session::flush(); //delete the session

                Session::flash('message','Successfully Reset Your Password.You May Login Now.');
                return redirect()->route('get-user-login');
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('error',$e->getMessage());
            }
        }
        else{
            Session::flash('error', "Password and Confirm Password Does not match !");
        }
        return redirect()->back();
    }

    public function getLogin()
    {
       /* if(Session::has('card_number')) {
            return redirect()->intended('dashboard');
        }
        else{
            return view('user::signin._form');
        }*/

        if(Auth::check()) {
            Auth::user()->get()->email;exit;
            //return redirect()->intended('dashboard');
        }
        else{
            return view('user::signin._form');
        }
    }

    public function postLogin(Request $request)
    {
        $data = Input::all();

        date_default_timezone_set("Asia/Dacca");

        if(Auth::check()){
            Session::put('card_number', isset(Auth::user()->default_id));
            Session::flash('message', "You Have Already Logged In.");
            return redirect()->route('dashboard');
        }else{
            //$field = filter_var($data['card_number'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $user_data_exists = EmployeeData::where('card_number', $data['card_number'])->exists();

            if($user_data_exists){

                $user_data = EmployeeData::where('card_number', $data['card_number'])->first();

                if($user_data['password']==$data['password']){

                    $attempt = Auth::attempt([
                        'card_number' => $request->get('card_number'),
                        'password' => $request->get('password'),
                    ]);
                    if($attempt){

                        Session::put('card_number', $user_data->card_number);
                        Session::flash('message', "Successfully  Logged In.");
                        return redirect()->intended('dashboard');
                    }else{
                        Session::flash('danger', "Password Incorrect.Please Try Again");
                    }
                }else{
                    Session::flash('danger', "Wrong Password .Please Try Again!!!!");
                }
            }else{
                Session::flash('danger', "This card number does not exists.Please Try Again");
            }
            return redirect()->back();
        }
    }

    public function logout() {
        $id = Auth::id();
        //print_r($id);exit;
        /* Transaction Start Here */
        DB::beginTransaction();
        try{

            Auth::logout();
            DB::commit();
            //Session::flash('message', 'You Are Now Logged Out.');
        }catch(\Exception $e){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('error', $e->getMessage());
        }

        Session::flush(); //delete the session
        Session::flash('message', 'You Are Now Logged Out.');
        return redirect()->route('get-user-login');
    }
}