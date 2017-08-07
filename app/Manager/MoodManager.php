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
            ->where('status', true)
            ->get()
            ->groupBy('mood');

        return self::moodCalculate($moods);
    }

    public static function getMoodReviewByCompanyId($startDate, $endDate)
    {
        $authCompanyId = Auth::user()->company_id;
        $getCompanyEmployees = EmployeeManager::getAllEmployeeByCompanyId($authCompanyId);
        $getCompanyMood = MoodModel::where('company_id', $authCompanyId)
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->where('status', true)
            ->get()
            ->groupBy('employee_id');

        $mood['totalEmployeeCount'] = count($getCompanyEmployees);
        $mood['totalMoodActiveEmployeeCount'] = count($getCompanyMood);
        $mood['percent'] = (100 / $mood['totalEmployeeCount']) * $mood['totalMoodActiveEmployeeCount'];

        return $mood;
    }

    public static function getWeekAverageMoodByCompanyId($startDate, $endDate)
    {
        $authCompanyId = Auth::user()->company_id;
        $getCompanyWeekMood = MoodModel::where('company_id', $authCompanyId)
            ->where('created_at', '>', $startDate)
            ->where('created_at', '<', $endDate)
            ->where('status', true)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d-m');
            });

        return $getCompanyWeekMood;
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
                    $mood['Total' . $i] = count($moods[$i]);
                    $mood['totalCount'] += $mood['Total' . $i];
                    $mood['average'] += $mood['Total' . $i];
                    $total += $mood['Total' . $i] * $i;
                }
            }

            $mood['average'] = round($total / $mood['totalCount']);
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