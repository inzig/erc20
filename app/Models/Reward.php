<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bnes',
    ];

    /**
     * user of reward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * referral address of reward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    /**
     * transaction of reward
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(TransactionHistory::class, 'transaction_id');
    }
}
