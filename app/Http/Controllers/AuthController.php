<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests;
use Session;
use App\ou_user;
use App\ou_publication;
use App\ou_user_content;
use App\ou_external_links;

class AuthController extends Controller
{
   //
    function getsignUp()
    {
        if(Session::has('email'))
        {
          return redirect()->route('home');
        }
        else
        {
        return view('signup');
      }
    }
    function postSignUp(Request $request)
    {

        $this->validate($request,[

            'email'=>'required|unique:ou_user_basic|email|max:255',
            'password'=>'required|min:6|max:15|alpha_num',

             ]);
        $user=new User;
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->save();
        $ou_user=new ou_user;
        $ou_user->email=$request->input('email');
        $ou_user->save();
        $user_content=new ou_user_content;
        $user_content->email=$request->input('email');
        $user_content->save();
        $user_publication=new ou_publication;
        $user_publication->email=$request->input('email');
        $user_publication->save();
        $user_links=new ou_external_links;
        $user_links->email=$request->input('email');
        $user_links->save();

         return redirect()
            ->route('/')
            ->with('info','Your Account has been created and you can Sign in');
}
function postSignIn(Request $request)
{
  $this->validate($request,[
         'email'=>'required',
          'password'=>'required',
      ]);
      if(!Auth::attempt($request->only(['email','password'])))
       {
           return redirect()->back()->with('info','Sorry, could not sign you in');
       }
       else{
        Session::put('email',$request->input('email'));
        Session::put('password',$request->input('password'));
        return redirect()->route('home')->with('info','Signed in successfully');
      }
}
function getHome(){
  if(Session::has('email'))
  {
    $email=Session::get('email');
    $user_details=ou_user::where('email',$email)->first();
    $edit_content=ou_user_content::where('email',$email)->first();
    $publication_count=ou_publication::count();
    if($publication_count==1)
    {
    $user_publication=ou_publication::where('email',$email)->first();
    }
    else {
    $user_publication=ou_publication::where('email',$email)->get();
    }
    return view('home')->with('user',$user_details)->with('user_publications',$user_publication)
              ->with('publication_count',$publication_count)->with('edit_content',$edit_content);
  }
  else {
  return redirect()->route('/')->with('info','Please Signin to continue.');
  }
}
function signOut(){
  if(Session::has('email'))
  {
  Session::flush();
  return redirect()->route('/')->with('info','Signed out successfully');
}
else {
  return redirect()->route('/');
}
}
}
