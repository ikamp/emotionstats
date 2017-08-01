<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'mood';
    public $timestamps = true;

    public function employee()
    {
        $this->belongsTo('App\Model\Employee', 'employee_id', 'id');
    }

    public function company()
    {
        $this->hasOne('App\Model\Company', 'company_id', 'id');
    }
}
