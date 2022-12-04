<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "categories";
    public function products()
   {
       return $this->hasMany('App\Models\Product','id_category','id');
   }
   public function images()
   {
       return $this->hasMany('App\Models\Image','id_category','id');
   }
}
