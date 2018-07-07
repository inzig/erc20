<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class ICOBonus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ico_bonuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'week',
        'type',
        'discount',
    ];
}
