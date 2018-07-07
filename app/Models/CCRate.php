<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class CCRate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crypto_currency_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'usd', 'btc', 'response'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'usd' => 'double',
//        'btc' => 'double',
        'response' => 'collection',
    ];
}
