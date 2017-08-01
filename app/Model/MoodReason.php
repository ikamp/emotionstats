<?php

namespace App\Model;

class MoodReason extends BaseModel
{
    protected $table = 'moodreason';
    public $timestamps = true;

    public function mood()
    {
        return $this->belongsTo('App\Model\Mood', 'mood_id', 'id');
    }
}
