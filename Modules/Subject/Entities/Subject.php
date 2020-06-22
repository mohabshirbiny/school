<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Grade\Entities\Grade;
class Subject extends Model
{
    protected $fillable = ['name','image','grade_id'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
