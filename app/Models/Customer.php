<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "customers";

    public function bill(){
        return $this->hasMany('App\Models\Bill','id_customer','id');
    }

}
