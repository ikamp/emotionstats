<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id', 'id');
    }

    public function employee()
    {
        return $this->hasMany('App\Model\Employee', 'department_id', 'id');
    }
}
