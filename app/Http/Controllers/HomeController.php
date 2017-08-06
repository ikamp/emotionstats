<?php

namespace App\Http\Controllers;

use App\Manager\MoodManager;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkIfManager');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = Carbon::now()->addWeek(-4);
        $endDate = Carbon::now();

        $mood = MoodManager::getMoodCalculateByCompanyId($startDate, $endDate);

        return response()->json($mood);
    }
}
