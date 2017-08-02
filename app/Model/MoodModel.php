<?php

namespace App\Model;

class MoodModel extends BaseModel
{
    protected $table = 'mood';
    public $timestamps = true;

    public function employee()
    {
        $this->belongsTo('App\Model\EmployeeModel', 'employee_id', 'id');
    }

    public function company()
    {
        $this->hasOne('App\Model\CompanyModel', 'company_id', 'id');
    }
}
