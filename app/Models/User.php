<?php

namespace BCES\Models;

use BCES\Concerns\Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'activated',
        'oauth',
        'bnes',
        'runcpa',
        'cryptocpa',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'activated' => 'boolean',
    ];

    /**
     * Find out if User is an admin, based on ID
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->id == 1;
    }

    /**
     * Initial coin offering addresses of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function icos()
    {
        return $this->hasMany(ICO::class);
    }

    /**
     * Activation of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activation()
    {
        return $this->hasOne(Activation::class);
    }

    /**
     * Transaction history of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(TransactionHistory::class);
    }

    /**
     * user's referral address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }

    /**
     * user's referral address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function referral()
    {
        return $this->hasOne(Referral::class);
    }

    /**
     * user's kyc information
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kyc()
    {
        return $this->hasOne(KnowYourCustomer::class);
    }
    /**
     * Referrer of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function referrer()
    {
        return $this->belongsToMany(Referral::class, 'referral_mapping');
    }

    /**
     * Pool address of user for contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pools()
    {
        return $this->hasMany(AddressPool::class);
    }
}
