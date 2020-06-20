<?php

namespace Modules\UserData\Entities;

use Illuminate\Database\Eloquent\Model;

class MUDepartment extends Model
{

    /**
     * The table database connection
     *
     * @var string
     */
    protected $connection = 'oracle_without_p';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mu_departments';

    /**
     * Set table primary key
     * @var string
     */
    protected $primaryKey = 'dep_id';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get users
     */
    public function users()
    {
        return User::where('user_dept', $this->dep_no);
    }

    /**
     * Get parent
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'dep_pid', 'dep_no');
    }
}
