<?php

namespace App\Model;

class MoodReasonModel extends BaseModel
{
    protected $table = 'moodreason';
    public $timestamps = true;

    public function mood()
    {
        return $this->belongsTo('App\Model\MoodModel', 'mood_id', 'id');
    }
}
