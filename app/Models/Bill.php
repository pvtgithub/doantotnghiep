<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "bills";
    
    //bill thuoc ve 1 khach hang
    public function customer(){
        return $this->belongsTo('App\Models\Customer','id_customer','id');
    }

    //1 bill co nhieu bill detail
    public function bill_details(){
        return $this->hasMany('App\Models\BillDetail','id_bill','id');
    }

    
}
