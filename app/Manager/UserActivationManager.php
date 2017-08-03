<?php

namespace App\Manager;

use App\Model\UserActivationModel;
use Illuminate\Support\Facades\Auth;

class UserActivationManager
{

    public static function getById($id)
    {
        return UserActivationModel::find($id);
    }

    public static function getByIdWithToken($id)
    {
        $userToken = UserActivationModel::with("employee")->where("employee_id", Auth::id())->get();

        $mapUserToken = self::mapUserActivation($userToken);

        return [
            'token' => $mapUserToken->getToken()
        ];
    }

    public static function mapUserActivation(UserActivationModel $employee)
    {
        $UserActivationEntity = new UserActivationModel();

        $UserActivationEntity->setId($employee->id);
        $UserActivationEntity->setExpirationDate($employee->expirationDate);
        $UserActivationEntity->setEmployeeId($employee->employeeId);
        $UserActivationEntity->setToken($employee->token);

        return $UserActivationEntity;
    }


}