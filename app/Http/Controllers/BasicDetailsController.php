<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ou_user;
use Session;

class BasicDetailsController extends Controller
{
    //
    function postBasicDetails(Request $request){
      if(Session::has('email'))
      {
        $alpha_regex='/^[A-Za-z\s]+$/';
        $phone_regex='/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
        $fax_regex='/[\+? *[1-9]+]?[0-9 ]+/';
        $this->validate($request,[

            'name'=>'required|regex:/^[A-Za-z\s]+$/',
            'status'=>'regex:/^[A-Za-z\s]+$/',
            'school'=>'regex:/^[A-Za-z\s]+$/',
            'phone'=>'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
            'fax'=>'regex:/[\+? *[1-9]+]?[0-9 ]+/',
            'office'=>'regex:/^[A-Za-z\s]+$/',
             ]);
             
        $ou_user=new ou_user;
        $email=Session::get('email');
        $fullname=$request->name;
        $status=$request->status;
        $school=$request->school;
        $phone=$request->phone;
        $fax=$request->fax;
        $url=$request->url;
        $office=$request->office;
        $ou_user::where('email',$email)->update(['fullname'=>$fullname,'status'=>$status,'school'=>$school,
                                                'phone'=>$phone,'fax'=>$fax,'url'=>$url,'office'=>$office]);
        return redirect()->route('home')->with('info','Details Updated!');
      }
      else {
        # code...
      }

    }
}
