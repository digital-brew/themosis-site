<?php

namespace DigitalBrew\Domain\Customer\Models;

use Illuminate\Notifications\Notifiable;
use Themosis\Core\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
