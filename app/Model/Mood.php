<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'mood';
    public $timestamps = false;

    public function employee()
    {
        $this->belongsTo('App\Model\Employee', 'employee_id', 'id');
    }


}
