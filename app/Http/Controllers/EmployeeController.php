<?php

namespace App\Http\Controllers;

use App\Entity\EmployeeEntity;
use App\Manager\EmployeeManager;
use App\Model\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = EmployeeManager::getById(Auth::id());
        $companyEmployees = EmployeeManager::getAllEmployeeByCompanyId($employee->company_id);

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

        $newEmployee = EmployeeModel::create([
            'name' => $request->employee['name'],
            'email' => $request->employee['email'],
            'department_id' => $request->employee['department_id'],
            'company_id' => $authEmployee->attributes['company_id'],
            'role' => EmployeeEntity::EMPLOYEE,
            'status' => EmployeeEntity::WAITING
        ]);

        //email gönderilecek > activate mail

        return response()->json($newEmployee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EmployeeManager::setDepartmentById($id, 1);
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

    public function changeDepartment(Request $request) {
        $id = $request->employee['id'];
        $department_id = $request->employee['department_id'];

        return EmployeeManager::setDepartmentById($id, $department_id);
    }
}
