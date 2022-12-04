<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "images";
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','id_category','id');
    }
    public function news(){
        return $this->belongsTo('App\Models\News','id_news','id');
    }
}
