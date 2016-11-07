@extends('templates.default')
@section('content')


<div id="signup" class="row margin-top-25 margin-bottom-100" >
    <form id="signup" class="col-md-6 col-md-offset-3" method="post" action={{route('signup')}} >
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="email">Email address*</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
  </div>
        <div id="email_alert2" class="alert alert-danger hidden" role="alert">
   <p>Make sure you enter a valid email id!</p>
</div>
  <div class="form-group">
    <label for="password">Password*</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
         <div id="password_alert2" class="alert alert-danger hidden" role="alert">
   <p>Password must be aplhanumeric and must be between 6 to 15 characters in length!</p>
</div>
    <div class="form-group">
    <label for="confirmpassword">Confirm Password*</label>
    <input type="password" class="form-control" id="confirmpassword" name="password_confirmation" placeholder="Confirm Password" required>
  </div>
         <div id="confirm_alert" class="alert alert-danger hidden" role="alert">
   <p>Passwords dont match!</p>
</div>
  <button type="submit" class="btn btn-default">Register</button>
        <span><p>Or</p></span>
    <button class="btn btn-default" onclick="return loadSignin()">Signin</button>
</form>

</div>
<div id="signin" class="row margin-top-25 margin-bottom-100">
    <form id="signin" method="post" action={{route('signin')}} class="col-md-6 col-md-offset-3" >
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="email">Email address*</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
  </div>
    <div id="email_alert1" class="alert alert-danger hidden" role="alert">
   <p>Make sure you enter a valid email id!</p>
    </div>
  <div class="form-group">
    <label for="password">Password*</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
    <div id="password_alert1" class="alert alert-danger hidden" role="alert">
   <p>Invalid Password!</p>
</div>
 <button type="submit" class="btn btn-default">Signin</button>
        <span><p>Or</p></span>
    <button class="btn btn-default" onclick="return loadSignup()">Register</button>
</form>
</div>

@stop
