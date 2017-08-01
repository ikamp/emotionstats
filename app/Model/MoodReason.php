<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoodReason extends Model
{
    protected $table = 'moodreason';
    public $timestamps = true;

    public function mood()
    {
        return $this->belongsTo('App\Model\Mood', 'mood_id', 'id');
    }
}
