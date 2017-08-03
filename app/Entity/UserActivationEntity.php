<?php

namespace App\Entity;

class UserActivationEntity
{
    protected $id;
    protected $expirationDate;
    protected $employeeId;
    protected $token;

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
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @param mixed $name
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }


    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}