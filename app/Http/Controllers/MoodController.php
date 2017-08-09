<?php

namespace App\Http\Controllers;

use App\Manager\MoodManager;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = Carbon::now()->addWeek(-1);
        $endDate = Carbon::now();
        $mood = MoodManager::getMoodCalculateByEmployeeId($startDate, $endDate);

        return response()->json($mood);
    }

    public function add(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mood = $request->mood;
        $description = $request->description;
        $moodId = $request->moodId;

        $getMood = MoodManager::getById($moodId);
        $getMood->mood = $mood;
        $getMood->description = $description;
        $getMood->status = true;
        $getMood->save();

        return $getMood;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
