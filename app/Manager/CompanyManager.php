<?php

namespace App\Manager;

use App\Model\CompanyModel;

class CompanyManager
{
    public static function getById($id)
    {
        return CompanyModel::find($id);
    }

    public static function getByIdEmployees($id)
    {
        return CompanyModel::with('employees')->find($id);
    }
}