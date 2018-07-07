<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class AddressPool extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'crypto_type', 'is_allocated'
    ];

    /**
     * Get user of pool address
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * All transactions of pool address
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function allTrans()
    {
        return $this->morphMany(AllTransaction::class, 'icoable');
    }
}
