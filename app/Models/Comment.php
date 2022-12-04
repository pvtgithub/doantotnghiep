<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "comments";

    public function user(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
    public function blog(){
        return $this->belongsTo('App\Models\News','id_news','id');
    }
}
