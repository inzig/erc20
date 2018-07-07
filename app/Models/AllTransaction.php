<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class AllTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from',
        'to',
        'hash',
        'amount',
        'currency',
        'input_data',
        'completed',
        'updated_when',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'collection',
        'completed' => 'boolean',
        'updated_when' => 'datetime',
    ];

    /**
     * Get the ables of the transaction
     */
    public function icoable()
    {
        return $this->morphTo();
    }
}
