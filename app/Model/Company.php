<?php

namespace App\Model;

class Company extends BaseModel
{
    protected $table = 'company';
    public $timestamps = true;

    public function departments()
    {
        return $this->hasMany('App\Model\Department', 'company_id', 'id');
    }
}
