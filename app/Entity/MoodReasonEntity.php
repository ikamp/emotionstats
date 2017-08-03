<?php

namespace App\Entity;

class MoodReasonEntity
{
    protected $id;
    protected $moodId;
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
}
