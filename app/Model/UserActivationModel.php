<?php

namespace App\Model;

class UserActivationModel extends BaseModel
{
    protected $table = 'useractivation';
    public $timestamps = true;

    public function employee()
    {
        return $this->belongsTo('App\Model\Employee', 'employee_id', 'id');
    }

}
