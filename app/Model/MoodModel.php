<?php

namespace App\Model;

class MoodModel extends BaseModel
{
    protected $table = 'mood';
    public $timestamps = true;

    public function employee()
    {
        return $this->belongsTo('App\Model\EmployeeModel', 'id', 'employee_id');
    }

    public function company()
    {
        return $this->hasOne('App\Model\CompanyModel', 'id', 'company_id');
    }

    public function moodreason()
    {
        return $this->hasMany('App\Model\MoodReasonModel', 'mood_id', 'id');
    }
}


