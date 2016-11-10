<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ou_publication extends Model
{
    //
    protected $table='ou_publication';
    protected $fillable=['email','book','chapter','article','conference'];
}
