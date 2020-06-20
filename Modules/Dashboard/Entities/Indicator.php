<?php

namespace Modules\Dashboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Indicator extends Model
{
    use SoftDeletes;
    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function getLabelsAttribute()
    {
        $labels = [];
        foreach (self::all() as $indicator){
            $labels[] = $indicator->name;
        }
        return $labels;
    }

    public function getViewsAttribute()
    {
        return DB::table('ERP.' . $this->table_name)->get();
    }

    public function getViewsCountAttribute()
    {
        return DB::table('ERP.' . $this->table_name)->count();
    }
}
