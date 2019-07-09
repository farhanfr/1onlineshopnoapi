<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptPaymentModel extends Model
{
    protected $table='receiptpayment';
    protected $primaryKey='id_receiptpayment';
    protected $fillable=['img_receipt','no_checkout'];
    public $timestamps=FALSE;
}
