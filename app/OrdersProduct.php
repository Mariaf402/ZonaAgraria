<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'product_id','product_code','product_name','product_size',
        'product_color','product_price','product_qty',
    ];
}
