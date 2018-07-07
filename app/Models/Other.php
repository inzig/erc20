<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $fillable = ['name', 'title_en', 'title_ru', 'title_cn', 'description_en', 'description_ru', 'description_cn'];

    /**
     * Designation according to language locale
     *
     * @return string
     */
    public function getTitleAttribute()
    {
        return $this->toArray()['title_' . app()->getLocale()];
    }

    /**
     * Designation according to language locale
     *
     * @return string
     */
    public function getDescriptionAttribute()
    {
        return $this->toArray()['description_' . app()->getLocale()];
    }
}
