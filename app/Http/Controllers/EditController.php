<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\ou_user_content;
use App\ou_publication;


class EditController extends Controller
{
    //
    function postEditContent(Request $request)
    {
        if(Session::has("email"))
        {
          $email=Session::get('email');
          $user_content= new ou_user_content;
          $education=$request->input('education');
          $about=$request->input('about');
          $research=$request->input('research');
          $user_content::where('email',$email)->update(['education'=>$education,'about'=>$about,'research'=>$research]);
          $tab="asmdks";
          return redirect()->route('home')->with('info','Details Updated successfully!');
                }
        else {
            return redirect()->route('/')->with('info','Please signin to continue');
        }
    }
    function handlePublication(Request $request)
    {
      if(Session::has("email"))
      {
        if(isset($_POST['update']))
        {
        $email=Session::get('email');
        $id=$request->input('id');
        $book=$request->input('book');
        $chapter=$request->input('chapter');
        $article=$request->input('article');
        $conference=$request->input('conference');
        $publication=new ou_publication;
        $publication::where('id',$id)->update(['email'=>$email,'book'=>$book,'chapter'=>$chapter,'article'=>$article,'conference'=>$conference]);
        $message="Publication added successfully!";
        }
        else
        {
          $id=$request->input('id');
          dd($id);
          $entry = ou_publication::find($id);
          $entry->delete();
          $message="Entry Deleted!";
        }
        return redirect()->route('home')->with('info',$message);

      }
    }
    function postNewPublication(Request $request)
    {
      if(Session::has('email'))
      {
        $publication=new ou_publication;
        $publication->email=$request->input('email');
        $publication->book=$request->input('book');
        $publication->chapter=$request->input('chapter');
        $publication->article=$request->input('article');
        $publication->conference=$request->input('conference');
        return redirect()->route('home')->with('info','Publication Added!');
      }
    }
}
