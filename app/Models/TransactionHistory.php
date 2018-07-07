<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bnes',
        'balance',
        'currency',
        'unique_value',
        'address',
        'referral',
        'completed',
        'is_approved',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'referral' => 'boolean',
        'completed' => 'boolean',

        'is_approved' => 'datetime',
    ];

    /**
     * Activation of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * reward of transaction history
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reward()
    {
        return $this->hasOne(Reward::class, 'transaction_id');
    }
}
