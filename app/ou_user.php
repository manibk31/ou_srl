<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ou_user extends Model
{
    //
    protected $table='ou_user';
    protected $fillable=['email','fullname','status','school','phone','fax','url','office','photo'];
}
