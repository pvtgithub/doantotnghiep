<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "products";

     public function category()
    {
        return $this->belongsTo('App\Models\Category','id_category','id');
    }

    public function images(){
        return $this->hasMany('App\Models\Image','id_product','id');
    }

    public function bill_details(){
        return $this->hasMany('App\Models\BillDetail','id_product','id');
    }
}
