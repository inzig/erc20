<?php

namespace BCES\Models;

use Illuminate\Database\Eloquent\Model;

class ICO extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'initial_coin_offerings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'type', 'title', 'address', 'hard_cap', 'earnings', 'usd', 'minimum', 'active',
        'pre_sale_at', 'pre_sale_end_at','pre_ico_at', 'pre_ico_end_at', 'main_ico_at', 'ico_expire_at', 'updated_once', 'address_errors'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'earnings' => 'double',
//        'minimum' => 'double',
//        'hard_cap' => 'double',

        'address_errors' => 'collection',

        'active' => 'boolean',
        'pre_sale_at' => 'datetime',
        'pre_sale_end_at' => 'datetime',
        'pre_ico_at' => 'datetime',
        'pre_ico_end_at' => 'datetime',
        'main_ico_at' => 'datetime',
        'ico_expire_at' => 'datetime',
        'updated_once' => 'datetime',
    ];

    /**
     * ICO address of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * All transactions of ICO address
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function allTrans()
    {
        return $this->morphMany(AllTransaction::class, 'icoable');
    }

    public static function boot()
    {
        static::creating(function ($model) {
            $slug = $model->type;

            switch ($model->type) {
                case 'bitcoin':
                    $slug = 'btc';
                    break;
                case 'litecoin':
                    $slug = 'ltc';
                    break;
                case 'dashcoin':
                    $slug = 'dash';
                    break;
                case 'ethereum':
                    $slug = 'eth';
                    break;
            }

            $model->slug = $slug;
        });
    }
}
