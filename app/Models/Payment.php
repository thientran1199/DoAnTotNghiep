<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payment';
    public function order(){
    	return $this->hasOne(Order::class);
    }
}
