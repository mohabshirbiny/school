<?php

namespace Modules\UserData\Entities;

use Illuminate\Database\Eloquent\Model;

class HRDepartment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hr_departments';
    protected $connection = 'oracle_without_p';

    public static $types = [
        'deanship' => 1,
        'collage' => 2,
        'department' => 3,
        'section' => 7
    ];

    /**
     * Get parent
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get children
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')
                     ->where('parent_id', $this->id);
    }

    /**
     * Scope a query to collages.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCollages($query)
    {
        return $query->where('type', self::$types['collage']);
    }

    /**
     * Scope a query to collages.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasEmployees($query)
    {
        return $query->where('is_employee_appointment', 1);
    }

    /**
     * Get collage scientific sections
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scientificSections()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')
                    ->where('parent_id', $this->id)
                    ->where('type', self::$types['section']);
    }

    public function networkPhoneDomains()
    {
      return $this->hasMany(DepartmentDomain::class, 'department_id', 'id');
  }

    /**
     * Get Main departments
     */
    public function mainDepartments($parent_id = 1)
    {
        return self::find($parent_id)->children();
    }

    // /**
    //  * The "booting" method of the model.
    //  *
    //  * @return void
    //  */
    // protected static function boot()
    // {
    //     parent::boot();
    //
    //     static::addGlobalScope(new ActiveDepartment);
    // }
}
