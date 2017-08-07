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
        $now = Carbon::now();

        $currentWeek = Carbon::now()->addWeek(-1);
        $mood['moodReviews'] = MoodManager::getMoodReviewByCompanyId($currentWeek, $now);

        $beforeFourWeek = Carbon::now()->addWeek(-4);
        $mood['averageMood'] = MoodManager::getWeekAverageMoodByCompanyId($beforeFourWeek, $now);



        return response()->json($mood);
    }
}
