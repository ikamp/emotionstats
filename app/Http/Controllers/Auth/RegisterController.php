<?php

namespace App\Http\Controllers\Auth;

use App\Model\EmployeeModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\UserActivationModel;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/#/mymood';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Model\EmployeeModel
     */
    protected function create(array $data)
    {
        $employee = EmployeeModel::create([
            'name' => $data['name'],
            'role' => 'manager',
            'status' => 'active',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = new UserActivationModel();
        $token->employee_id = $employee->id;
        $token->token = str_random('32');
        $token->expiration_date = Carbon::now()->addHours(1);
        $token->save();

        //return response()->json($token->token);
        Mail::to($employee->email)->send(new \App\Mail\verification($employee->id));

        return $employee;

    }
}
