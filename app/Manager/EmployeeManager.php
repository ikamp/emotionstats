<?php

namespace App\Manager;

use App\Model\EmployeeModel;

class EmployeeManager
{
    public static function getById($id)
    {
        return EmployeeModel::find($id);
    }

    public static function getByIdWithCompany($id)
    {
        return EmployeeModel::with('company')->find($id);
    }

    public static function getByIdWithDepartment($id)
    {
        return EmployeeModel::with('department')->find($id);
    }

    public static function getByIdWithMoods($id)
    {
        return EmployeeModel::with('moods')->find($id);
    }

    public static function getByIdWithFull($id)
    {
        return EmployeeModel::with('company', 'department', 'moods')->find($id);
    }
}