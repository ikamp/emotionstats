<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Manager\UserActivationManager;
use Illuminate\Support\Facades\Mail;
use App\Manager\EmployeeManager;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $email = $request->email;
        $employee = EmployeeManager::getByEmail($email);

        Mail::to($employee->email)->send(new \App\Mail\ForgotPassword($employee->name,$employee->remember_token));

    }
}
