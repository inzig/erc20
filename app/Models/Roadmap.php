<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    //
    protected $fillable = ['title', 'description_en','description_ru','description_cn','year'];

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
