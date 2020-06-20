<?php

namespace Modules\UserData\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\UserData\Entities\Employee;

class UserData extends Model
{
    protected $table = 'mu_users';

    protected $connection = 'oracle_without_p';

    protected $fillable = [];

    public function employee()
    {
        return Employee::where('national_id', $this->user_idno)
                    ->first();
    }

    public function employeeObject() {
    return $this->belongsTo(Employee::class, 'user_idno', 'national_id')
                ->where('national_id', $this->user_idno);
    }
    /**
     * Get user info from employee table
     */
    public function employeeTable()
    {
        return $this->hasOne(Employee::class, 'national_id', 'user_idno');
    }
}
