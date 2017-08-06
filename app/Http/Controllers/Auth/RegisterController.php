<?php

namespace App\Http\Controllers\Auth;

use App\Model\CompanyModel;
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
        $company = new CompanyModel();
        $company->name = $data['company_name'];
        $company->save();

        $employee = EmployeeModel::create([
            'name' => $data['name'],
            'role' => 'manager',
            'status' => 'waiting',
            'email' => $data['email'],
            'company_id' => $company->id,
            'remember_token' => str_random(10),
            'password' => bcrypt($data['password']),
            'department_id' => 3
        ]);

        $token = new UserActivationModel();
        $token->employee_id = $employee->id;
        $token->token = str_random('32');
        $token->expiration_date = Carbon::now()->addMinutes(1);
        $token->save();

        Mail::to($employee->email)->send(new \App\Mail\verification($employee->id));

        return $employee;

    }
}
