<?php

namespace App\Manager;

use App\Model\DepartmentModel;

class DepartmentManager
{
    public static function getById($id)
    {
        return DepartmentModel::find($id);
    }

    public static function getDepartmentByCompanyId($companyId)
    {
        return DepartmentModel::where('company_id', $companyId)->get();
    }
}