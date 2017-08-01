<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoodReason extends Model
{
    protected $table = 'moodreason';
    public $timestamps = true;

    public function employees()
    {
        return $this->hasMany('App\Model\Employee', 'employee_id', id);
    }

    public function moods()
    {
        return $this->hasMany('App\Model\Mood', 'mood_id', id);
    }
}
