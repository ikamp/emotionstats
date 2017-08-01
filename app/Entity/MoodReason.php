<?php

namespace App\Entity;

class MoodReason
{
    protected $id;
    protected $employee_id;
    protected $mood_id;
    protected $reason;

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
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * @param mixed $employee_id
     */
    public function setEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return mixed
     */
    public function getMoodId()
    {
        return $this->mood_id;
    }

    /**
     * @param mixed $mood_id
     */
    public function setMoodId($mood_id)
    {
        $this->mood_id = $mood_id;
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
}