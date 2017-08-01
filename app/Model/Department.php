<?php

namespace App\Model;

class Department extends BaseModel
{
    protected $table = 'department';
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany('App\Model\Employee', 'department_id', 'id');
    }
}
