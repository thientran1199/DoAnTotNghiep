<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CustomerShippingAddress extends Model
{
    protected $table = 'customer_shipping_address';
    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
