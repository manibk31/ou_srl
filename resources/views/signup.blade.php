@extends('templates.default')
@section('content')
<div id="signup" class="row" style="margin-top:100px;">
    <form id="signup" class="col-md-6 col-md-offset-3" method="post" action={{route('signup')}} >
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
        <div id="email_alert2" class="alert alert-danger hidden" role="alert">
   <p>Make sure you enter a valid email id!</p>
</div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
         <div id="password_alert2" class="alert alert-danger hidden" role="alert">
   <p>Password must be aplhanumeric must be between 6 to 15 characters in length!</p>
</div>
    <div class="form-group">
    <label for="confirmpassword">Confirm Password</label>
    <input type="password" class="form-control" id="confirmpassword" name="password_confirmation" placeholder="Password">
  </div>
         <div id="confirm_alert" class="alert alert-danger hidden" role="alert">
   <p>Passwords dont match!</p>
</div>
  <button type="submit" class="btn btn-default">Register</button>
        <span><p>Or</p></span>
    <button class="btn btn-default" onclick="return loadSignin()">Signin</button>
</form>

</div>
<div id="signin" class="row" style="margin-top:100px;">
    <form id="signin" method="post" action={{route('signin')}} class="col-md-6 col-md-offset-3" >
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
    <div id="email_alert1" class="alert alert-danger hidden" role="alert">
   <p>Make sure you enter a valid email id!</p>
    </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
    <div id="password_alert1" class="alert alert-danger hidden" role="alert">
   <p>Invalid Password!</p>
</div>
 <button type="submit" class="btn btn-default">Signin</button>
        <span><p>Or</p></span>
    <button class="btn btn-default" onclick="return loadSignup()">Register</button>
</form>
</div>
@if(Session::has('info'))
<div class="row">
<div class="message alert alert-info center col-md-6 col-md-offset-3">
 {{Session::get('info')}}
</div>
</div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger col-md-6 col-md-offset-3 message">

            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach

    </div>
@endif
@stop
