<?php

namespace App\Manager;

use App\Model\MoodModel;
use Illuminate\Support\Facades\Auth;

class MoodManager
{
    public static function getById($id)
    {
        return MoodModel::find($id);
    }

    public static function getGroupByCountByEmployeeId()
    {
        $moods = MoodModel::where('employee_id', Auth::id())
            ->get()
            ->groupBy('mood');
        if (isset($moods['1'])) {
            $mood['1Total'] = count($moods['1']);
        }
        if (isset($moods['2'])) {
            $mood['2Total'] = count($moods['2']);
        }
        if (isset($moods['3'])) {
            $mood['3Total'] = count($moods['3']);
        }
        if (isset($moods['4'])) {
            $mood['4Total'] = count($moods['4']);
        }
        if (isset($moods['5'])) {
            $mood['5Total'] = count($moods['5']);
        }

        $mood['totalCount'] = count($moods);

        $singleValue = 100 / $mood['totalCount'];

        if (isset($moods['1'])) {
            $mood['1TotalPercent'] = count($moods['1']) * $singleValue;
        }
        if (isset($moods['2'])) {
            $mood['2TotalPercent'] = count($moods['2']) * $singleValue;
        }
        if (isset($moods['3'])) {
            $mood['3TotalPercent'] = count($moods['3']) * $singleValue;
        }
        if (isset($moods['4'])) {
            $mood['4TotalPercent'] = count($moods['4']) * $singleValue;
        }
        if (isset($moods['5'])) {
            $mood['5TotalPercent'] = count($moods['5']) * $singleValue;
        }


        return $mood;
    }
}