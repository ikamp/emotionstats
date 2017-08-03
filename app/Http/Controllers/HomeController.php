<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entity\EmployeeEntity;
use App\Manager\EmployeeManager;
use App\Model\EmployeeModel;
use App\Entity\UserActivationEntity;
use App\Manager\UserActivationManager;
use App\Model\UserActivationModel;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Mail::to('dilara.gzbyk19@gmail.com')->send(new \App\Mail\verification());
    }

    public function activity($token)
    {
        $userToken = UserActivationManager::getByIdWithToken(Auth::id());
        if($userToken == $token) {
            $employee = Auth::user();
            $employee->status = "active";
            $employee->save();
            var_dump($employee);
        }
        // return view('home');
    }



}
