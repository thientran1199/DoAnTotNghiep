<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = 'customer';
	public function person(){
		return $this->belongsTo(Person::class);
	}
	public function customer_shipping_addresses(){
		return $this->hasMany(CustomerShippingAddress::class);
	}

	public function orders(){
		return $this->hasMany(Order::class);
	}    
}
