<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmployeeModel extends Authenticatable
{
    protected $table = 'employee';
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo('App\Model\CompanyModel', 'company_id', 'id');
    }

    public function department()
    {
        return $this->hasOne('App\Model\DepartmentModel', 'id', 'department_id');
    }

    public function moods()
    {
        return $this->hasMany('App\Model\MoodModel', 'employee_id', 'id');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'status', 'company_id', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
