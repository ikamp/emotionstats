<?php

namespace App\Model;

class DepartmentModel extends BaseModel
{
    protected $table = 'department';
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo('App\Model\CompanyModel', 'company_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany('App\Model\EmployeeModel', 'department_id', 'id');
    }
}
