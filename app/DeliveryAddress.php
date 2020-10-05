<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $fillable = [
        'user_id', 'user_email', 'name','address','city','state',
        'country','pincode','mobile'
    ];
}
 
