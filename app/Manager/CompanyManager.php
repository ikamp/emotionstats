<?php

namespace App\Manager;

use App\Model\CompanyModel;
use App\Model\EmployeeModel;

class CompanyManager
{
    public static function getById($id)
    {
        return CompanyModel::find($id);
    }

    public static function getListEmployeeById($id)
    {
        return EmployeeManager::getAllEmployeeByCompanyId($id);
    }
}