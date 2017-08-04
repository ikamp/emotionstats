<?php

namespace App\Manager;

use App\Entity\UserActivationEntity;
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
        var_dump(Auth::id());
        $userToken = UserActivationModel::with('employee')
            ->where("employee_id", Auth::id())
            ->first();

        var_dump($userToken);

        $mapUserToken = self::mapUserActivation($userToken);

        return [
            'token' => $mapUserToken->getToken()
        ];
    }

    public static function mapUserActivation($employee)
    {
        $employeeActivationEntity = new UserActivationEntity();

        $employeeActivationEntity->setId($employee->id);
        $employeeActivationEntity->setExpirationDate($employee->expiration_date);
        $employeeActivationEntity->setEmployeeId($employee->employee_id);
        $employeeActivationEntity->setToken($employee->token);

        return $employeeActivationEntity;
    }


}