<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the two factor record associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function twoFactor()
    {
        return $this->hasOne(TwoFactor::class);
    }

    /**
     * Check the two factor is pending verification for the user.
     *
     * @return boolean
     */
    public function twoFactorPendingVerification()
    {
        if (!$this->twoFactor) {
            return false;
        }

        return !$this->twoFactor->isVerified();
    }

    /**
     * Check the two factor is enabled for the user.
     *
     * @return boolean
     */
    public function twoFactorEnabled()
    {
        return (bool) optional($this->twoFactor)->isVerified();
    }
}
