<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    protected $table='bill';
    protected $primaryKey='id_bill';
    protected $fillable=['id_item','id_guest','bill_appears','bill_status','qty','date_checkout','code_payment','payment_method','no_checkout'];
    public $timestamps=FALSE;
}
