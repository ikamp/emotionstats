<?php

namespace App\Manager;

use App\Model\DepartmentModel;

class DepartmentManager
{
    public static function getById($id)
    {
        return DepartmentModel::find($id);
    }
}