<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Bonuse extends Model
{
    protected $fillable = ['title', 'first_offer','second_offer'];
}
