<?php

namespace Modules\Subject\Entities;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function getAnswersAttribute($value)
    {
        return json_decode($value);
    }
}
