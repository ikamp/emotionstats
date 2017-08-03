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

        $mood = [];
        if (isset($moods)) {
            $mood['totalCount'] = 0;
            $mood['average'] = 0;

            if (isset($moods['1'])) {
                $mood['1Total'] = count($moods['1']);
                $mood['totalCount'] += $mood['1Total'];
                $mood['average'] += $mood['1Total'];
            }

            if (isset($moods['2'])) {
                $mood['2Total'] = count($moods['2']);
                $mood['totalCount'] += $mood['2Total'];
                $mood['average'] += $mood['2Total'] * 2;
            }

            if (isset($moods['3'])) {
                $mood['3Total'] = count($moods['3']);
                $mood['totalCount'] += $mood['3Total'];
                $mood['average'] += $mood['3Total'] * 3;
            }

            if (isset($moods['4'])) {
                $mood['4Total'] = count($moods['4']);
                $mood['totalCount'] += $mood['4Total'];
                $mood['average'] += $mood['4Total'] * 4;
            }

            if (isset($moods['5'])) {
                $mood['5Total'] = count($moods['5']);
                $mood['totalCount'] += $mood['5Total'];
                $mood['average'] += $mood['5Total'] * 5;
            }

            $mood['average'] = round($mood['average'] / $mood['totalCount']);
            $singleMoodValue = 100 / $mood['totalCount'];

            if (isset($moods['1'])) {
                $mood['1TotalPresent'] = number_format($singleMoodValue * $mood['1Total'], 1);
            }

            if (isset($moods['2'])) {
                $mood['2TotalPresent'] = number_format($singleMoodValue * $mood['2Total'], 1);
            }

            if (isset($moods['3'])) {
                $mood['3TotalPresent'] = number_format($singleMoodValue * $mood['3Total'], 1);
            }

            if (isset($moods['4'])) {
                $mood['4TotalPresent'] = number_format($singleMoodValue * $mood['4Total'], 1);
            }

            if (isset($moods['5'])) {
                $mood['5TotalPresent'] = number_format($singleMoodValue * $mood['5Total'], 1);
            }
        }

        return $mood;
    }
}