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

    public static function getMoodCalculateByEmployeeId($startDate, $endDate)
    {
        $moods = MoodModel::where('employee_id', Auth::id())
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->get()
            ->groupBy('mood');

        return self::moodCalculate($moods);
    }

    public static function getMoodCalculateByCompanyId($startDate, $endDate)
    {
        $authCompanyId = Auth::user()->company_id;
        $getCompanyEmployees = EmployeeManager::getAllEmployeeByCompanyId($authCompanyId);
        $getCompanyMood = MoodModel::where('company_id', $authCompanyId)
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->where('status', true)
            ->get()
            ->groupBy('employee_id');

        $mood['moodReviews']['totalEmployeeCount'] = count($getCompanyEmployees);
        $mood['moodReviews']['totalMoodActiveEmployeeCount'] = count($getCompanyMood);

        return $mood;
    }

    public static function moodCalculate($moods)
    {
        $mood = [];
        if (count($moods) != 0) {
            $mood['totalCount'] = 0;
            $mood['average'] = 0;
            $total = 0;

            for ($i = 1; $i <= 5; $i++) {
                if (isset($moods[$i])) {
                    $mood[$i . 'Total'] = count($moods[$i]);
                    $mood['totalCount'] += $mood[$i . 'Total'];
                    $mood['average'] += $mood[$i . 'Total'];
                    $total += $mood[$i . 'Total'] * $i;
                }
            }

            $mood['average'] = round($total / $mood['totalCount']);
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