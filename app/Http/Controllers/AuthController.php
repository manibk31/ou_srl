<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    //
    function getsignUp()
    {
        return view('signup');
    }
}
