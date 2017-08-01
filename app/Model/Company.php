<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    public $timestamps = false;

    public function department()
    {
        return $this->hasMany('App\Model\Department', 'company_id', 'id');
    }
}
