<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    public function account(){
    	return $this->belongsTo(Account::class);
    }
    public function admin(){
    	return $this->hasOne(Admin::class);
    }
    public function customer(){
    	return $this->hasOne(Customer::class);
    }
}
