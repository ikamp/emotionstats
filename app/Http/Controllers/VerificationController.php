<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Manager\UserActivationManager;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function newToken()
    {
        $now = Carbon::now();
        $userToken = UserActivationManager::getById(Auth::id());
        var_dump(Auth::id());
        var_dump($userToken);
        if (Auth::user()->status != "active") {
            if ($userToken->expiration_date < $now) {
                $userToken->token = str_random('32');
                $userToken->expiration_date = Carbon::now()->addHours(1);
                $control = $userToken->save();
                var_dump($control);

                Mail::to(Auth::user()->email)->send(new \App\Mail\verification(Auth::user()->id));
            }
        }
        var_dump(true);
    }

    public function activity($token)
    {
        $userToken = UserActivationManager::getByIdWithToken(Auth::id());
        if ($userToken == $token) {
            var_dump($userToken);
            $employee = Auth::user();
            var_dump(Auth::user()->id);
            $employee->status = "active";
            $employee->save();
            return redirect('/#/mymood');
        }
    }

}
