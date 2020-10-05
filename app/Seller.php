<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    protected $fillable = [
        'name', 'email','mobile', 'password',
    ];

    protected $hidden = [
        'password', 'type','status',
    ];
}

