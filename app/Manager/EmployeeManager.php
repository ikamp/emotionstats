<?php

namespace App\Manager;

use App\Entity\EmployeeEntity;
use App\Model\EmployeeModel;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class EmployeeManager
{
    public static function getById($id)
    {
        return EmployeeModel::find($id);
    }

    public static function getAllActive()
    {
        return EmployeeModel::where('status', 'active');
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

    public static function setStatusById($id, $status)
    {
        return EmployeeModel::find($id)->update(['status' => $status]);
    }

    public static function setDepartmentById($id, $department_id)
    {
        return EmployeeModel::find($id)->update(['department_id' => $department_id]);
    }

    public static function getEmailCheckControl($email)
    {
        $email = EmployeeModel::where('email', $email)
            ->get();
        if (count($email) == 0) {
            return true;
        }

        return false;
    }

    public static function getByIdWithFull($id)
    {
        $employeeInfo = EmployeeModel::with('company', 'department', 'moods')->find($id);

        if (!$employeeInfo instanceof EmployeeModel) {
            throw new Exception('İstenilen çalışan kaydına ulaşılamadı.');
        }

        if ($employeeInfo->company_id != Auth::user()->company_id) {
            throw new Exception('Bu çalışan bilgilerini görüntülemeye yetkiniz yok.');
        }

        $mapEmployeeInfo = self::mapEmployee($employeeInfo);

        return [
            'employeeId' => $mapEmployeeInfo->getId(),
            'employeeName' => $mapEmployeeInfo->getName(),
            'employeeEmail' => $mapEmployeeInfo->getEmail(),
            'departmentName' => $mapEmployeeInfo->getDepartmentName(),
            'companyName' => $mapEmployeeInfo->getCompanyName(),
            'companyId' => $mapEmployeeInfo->getCompanyId()
        ];
    }

    public static function getAllEmployeeByCompanyId($company_id)
    {
        $companyEmployeeList = EmployeeModel::where('company_id', $company_id)->get();
        $mapCompanyEmployeeList = self::mapper($companyEmployeeList);

        $list = [];
        foreach ($mapCompanyEmployeeList as $employee) {
            $list[] = [
                'employeeId' => $employee->getId(),
                'employeeName' => $employee->getName(),
                'employeeEmail' => $employee->getEmail(),
                'departmentName' => $employee->getDepartmentName(),
                'companyName' => $employee->getCompanyName()
            ];
        }

        return $list;
    }

    public static function mapper($employeeList)
    {
        $list = [];
        foreach ($employeeList as $employee) {
            $list[] = self::mapEmployee($employee);
        }

        return $list;
    }

    public static function mapEmployee(EmployeeModel $employee)
    {
        $employeeEntity = new EmployeeEntity();

        $employeeEntity->setId($employee->id);
        $employeeEntity->setName($employee->name);
        $employeeEntity->setEmail($employee->email);
        $employeeEntity->setDepartmentId($employee->department_id);
        $employeeEntity->setCompanyId($employee->company_id);

        if (!isset($employee->department->name)) {
            $employeeEntity->setDepartmentName(DepartmentManager::getById($employeeEntity->getDepartmentId())->name);
        } else {
            $employeeEntity->setDepartmentName($employee->department->name);
        }

        if (!isset($employee->company->name)) {
            $employeeEntity->setCompanyName(CompanyManager::getById($employeeEntity->getCompanyId())->name);
        } else {
            $employeeEntity->setCompanyName($employee->company->name);
        }


        return $employeeEntity;
    }
}