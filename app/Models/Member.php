<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','title','designation_en', 'description_en','linkedin', 'avatar'];

    /**
     * Designation according to language locale
     *
     * @return string
     */
    public function getDesignationAttribute()
    {
        return $this->toArray()['designation_'.app()->getLocale()];
    }

    /**
     * Designation according to language locale
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->toArray()['description_'.app()->getLocale()];
    }
}
