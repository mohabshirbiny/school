<?php

namespace Modules\UserData\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hr_employees';
    protected $connection = 'oracle_without_p';


    public function department()
    {
        return $this->belongsTo(HRDepartment::class, 'real_dept_code');
    }

    public function directDepartment()
    {
        return $this->belongsTo(HRDepartment::class, 'dept_code');
    }

    public function departmentsManage()
    {
        return HRDepartment::where(function ($query) {
            $query->where('direct_manager_m_id', $this->employee_id)
                 ->orWhere('direct_manager_f_id', $this->employee_id);
        });
    }

    public function sectionsManage()
    {
        return $this->departmentsManage()->where('type', 7);
    }

    public function collagesManage()
    {
        return $this->departmentsManage()->where('type', 2);
    }

    public function sectionsManageCollages()
    {
        $collagesIds = $this->sectionsManage()->lists('parent_id');

        return HRDepartment::whereIn('id', $collagesIds);
    }

    public function getDirectManagerEmployeeId()
    {
        $employeeId = null;

        if ($this->gender == 1) {

            $employeeId = $this->directDepartment->direct_manager_m_id;

        } else if ($this->gender == 2) {
            $employeeId = $this->directDepartment->direct_manager_f_id;

            if ($employeeId == null) {
                $employeeId = $this->directDepartment->direct_manager_m_id;
            }
        }

        return $employeeId;
    }

    public function getParentManagerEmployeeId()
    {
        $employeeId = null;

        if ($this->gender == 1) {

            $employeeId = $this->department->direct_manager_m_id;

        } else if ($this->gender == 2) {

            $employeeId = $this->department->direct_manager_f_id;

            if ($employeeId == null) {
                $employeeId = $this->department->direct_manager_m_id;
            }
        }

        return $employeeId;
    }

    public function sameDirectDeptEmployees()
    {
        return self::where('dept_code', '=', $this->dept_code)
                   ->WhereNotIn('employee_id', [$this->employee_id]);
    }


    public function name()
    {
        if (App::getLocale() == "ar") {

            return $this->arabic_name;

        } else {

            return $this->english_name;
        }
    }
}
