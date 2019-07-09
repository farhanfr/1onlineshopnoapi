<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $table='cart';
    protected $primaryKey='id_cart';
    protected $fillable=['id_item','id_guest','qty'];
    public $timestamps=FALSE;
}
