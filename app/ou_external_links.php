<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ou_external_links extends Model
{
    //
    protected $table='ou_external_links';
    protected $fillable=['email','caption','url'];
}
