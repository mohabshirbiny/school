<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name','desc','pdf','video','subject_id','image'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
