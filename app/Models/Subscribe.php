<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','created_at'
    ];
}
