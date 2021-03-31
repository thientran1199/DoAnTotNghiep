<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table="image";
    public function product(){
    	$this->belongsTo(Product::class,'product_id','id');
    }
}
