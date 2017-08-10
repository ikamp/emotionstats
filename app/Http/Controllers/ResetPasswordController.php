<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager\EmployeeManager;
class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $token = $request->token;
        $employee = EmployeeManager::getByEmail($email);
        if ($employee->remember_token == $token) {
            $employee->password = bcrypt($password);
            $employee->save();
        }

    }
}
