<?php

namespace Modules\Grade\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Subject\Entities\Subject;

class Grade extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }

}
