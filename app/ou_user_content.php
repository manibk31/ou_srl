<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ou_user_content extends Model
{
    //
    protected $table='ou_user_content';
    protected $fillable=['email','education','about','research'];
}
