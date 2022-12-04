<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "bill_detail";

    public function bill(){
        return $this->belongsTo('App\Models\Bill','id_bill','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id');
    }
}
