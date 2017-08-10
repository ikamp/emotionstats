<?php

namespace App\Entity;

class MoodReasonEntity
{
    protected $id;
    protected $moodId;
    protected $reason;
    protected $reasons = [
        'Career',
        'Colleagues',
        'Communication',
        'Health',
        'Holidays',
        'Managers',
        'Organization',
        'Professional',
        'Salary',
        'Task area/Activity',
        'Work equipment',
        'Working time',
        'Workload',
        'Work environment',
        'Others'
    ];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMoodId()
    {
        return $this->moodId;
    }

    /**
     * @param mixed $moodId
     */
    public function setMoodId($moodId)
    {
        $this->moodId = $moodId;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * @param $index
     * @return string
     */
    public function getReasonsByIndex($index)
    {
        return $this->reasons[$index];
    }
}
