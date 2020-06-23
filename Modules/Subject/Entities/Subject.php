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

    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }
    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}
