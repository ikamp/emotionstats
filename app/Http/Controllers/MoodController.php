<?php

namespace App\Http\Controllers;

use App\Manager\MoodManager;
use App\Model\MoodReasonModel;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mood = MoodManager::getMoodCalculateByEmployeeId();

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

        foreach ($request->reasons as $reason) {
            $moodReason = new MoodReasonModel();
            $moodReason->reason = $reason;
            $moodReason->mood_id = $getMood->id;
            $moodReason->save();
        }
        var_dump($getMood);
        return $getMood;
    }
}
