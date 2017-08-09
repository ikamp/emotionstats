<?php

namespace App\Http\Controllers;

use App\Manager\EmployeeManager;
use App\Manager\MoodManager;
use App\Model\EmployeeModel;
use App\Model\MoodModel;
use Carbon\Carbon;
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

    public function run()
    {
        $employee = EmployeeModel::find(1);

        $mood = new MoodModel();
        $mood->employee_id = $employee->id;
        $mood->company_id = $employee->company_id;
        $mood->status = false;
        $mood->mood = 0;
        $mood->save();

        Mail::to($employee->email)->send(new \App\Mail\Mood($employee->name, $mood->id));

    }
}
