<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_address';
    public function order(){
    	return $this->hasOne(Order::class);
    }
}
