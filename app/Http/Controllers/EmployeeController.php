<?php

namespace App\Http\Controllers;

use App\Entity\EmployeeEntity;
use App\Manager\DepartmentManager;
use App\Manager\EmployeeManager;
use App\Model\DepartmentModel;
use App\Model\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;


class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyId = Auth::user()->company_id;

        $companyEmployees = EmployeeManager::getAllEmployeeByCompanyIdMap($companyId);
        $companyEmployees['departments'] = DepartmentManager::getDepartmentByCompanyId($companyId);

        return response()->json($companyEmployees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authEmployee = Auth::user();

        if (EmployeeManager::getEmailCheckControl($request->employee['email'])) {
            $newEmployee = EmployeeModel::create([
                'name' => $request->employee['name'],
                'email' => $request->employee['email'],
                'department_id' => $request->employee['department_id'],
                'company_id' => $authEmployee->attributes['company_id'],
                'role' => EmployeeEntity::EMPLOYEE,
                'status' => EmployeeEntity::WAITING
            ]);

            //activation email

            return response()->json($newEmployee);

        } else {
            throw new Exception('Bu email adresi zaten kayıtlı. Lütfen başka bir email adresi deneyin.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = EmployeeManager::getByIdWithFull($id);

        return response()->json($employee);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return EmployeeManager::setStatusById($id, EmployeeEntity::OFF);
    }

    public function changeDepartment(Request $request)
    {
        $id = $request->employee['id'];
        $department_id = $request->employee['department_id'];

        return EmployeeManager::setDepartmentById($id, $department_id);
    }

    public function newDepartment(Request $request)
    {
        $departmentName = $request->departmentName;

        $department = new DepartmentModel();
        $department->name = $departmentName;
        $department->company_id = Auth::user()->company_id;
        $department->save();

        return $department;
    }
}
