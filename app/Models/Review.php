<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    public function order_item(){
    	return $this->hasOne(OrderItem::class);
    }
}
