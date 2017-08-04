<?php

namespace App\Manager;

use App\Model\MoodModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MoodManager
{
    public static function getById($id)
    {
        return MoodModel::find($id);
    }

    public static function getGroupByCountByEmployeeId($startDate, $endDate)
    {
        $moods = MoodModel::where('employee_id', Auth::id())
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->get()
            ->groupBy('mood');

        $mood = [];
        if (count($moods) != 0) {
            $mood['totalCount'] = 0;
            $mood['average'] = 0;
            for ($i = 1; $i <= 5; $i++) {
                if (isset($moods[$i])) {
                    $mood[$i . 'Total'] = count($moods[$i]);
                    $mood['totalCount'] += $mood[$i . 'Total'];
                    $mood['average'] += $mood[$i . 'Total'];
                }
            }

            $mood['average'] = round($mood['average'] / $mood['totalCount']);
            $singleMoodValue = 100 / $mood['totalCount'];

            for ($i = 1; $i <= 5; $i++) {
                if (isset($moods[$i])) {
                    $mood[$i . 'TotalPresent'] = number_format($singleMoodValue * $mood[$i . 'Total'], 1);
                }
            }
        }

        return $mood;
    }
}