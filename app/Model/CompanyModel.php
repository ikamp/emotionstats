<?php

namespace App\Model;

class CompanyModel extends BaseModel
{
    protected $table = 'company';
    public $timestamps = true;

    public function departments()
    {
        return $this->hasMany('App\Model\DepartmentModel', 'company_id', 'id');
    }
}
