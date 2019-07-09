<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table='item';
    protected $primaryKey='id_item';
    protected $fillable=['item_name','total_item','id_category','item_price','item_desc','photo_item'];
    public $timestamps=FALSE;
}
