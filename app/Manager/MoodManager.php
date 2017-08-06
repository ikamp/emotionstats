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
                    $mood['Total' . $i] = count($moods[$i]);
                    $mood['totalCount'] += $mood['Total' . $i];
                    $mood['average'] += $mood['Total' . $i];
                }
            }

            $mood['average'] = round($mood['average'] / $mood['totalCount']);
            $singleMoodValue = 100 / $mood['totalCount'];

            for ($i = 1; $i <= 5; $i++) {
                if (isset($moods[$i])) {
                    $mood['TotalPercent' . $i] = number_format($singleMoodValue * $mood['Total' . $i], 1);
                }
            }
        }

        return $mood;
    }
}