<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "favourite";
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
}