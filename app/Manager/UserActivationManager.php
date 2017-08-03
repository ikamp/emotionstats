<?php

namespace App\Manager;

use App\Model\UserActivationModel;

class UserActivationManager{

    public static function getById($id)
    {
        return UserActivationModel::find($id);
    }
}