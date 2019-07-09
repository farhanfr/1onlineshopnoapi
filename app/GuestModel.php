<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestModel extends Model
{
    protected $table='guest';
    protected $primaryKey='id_guest';
    protected $fillable=['guest_name','guest_gender','guest_address','guest_phonenumber','guest_username','guest_password'];
    public $timestamps=FALSE;
}
