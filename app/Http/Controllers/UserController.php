<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Manager\UserActivationManager;

class UserController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect('/#/signin');
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json($user);
        }
        return response()->json(false);
    }
}
