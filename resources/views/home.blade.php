@extends('templates.default')
@section('content')

<div>

<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-10 col-md-offset-1" role="tablist" style="margin-top:25px;">
  <li role="presentation" class="active"><a href="#basic_details" aria-controls="basic_details" role="tab" data-toggle="tab">Basic Details</a></li>
  <li role="presentation"><a href="#edit_content" aria-controls="edit_content" role="tab" data-toggle="tab">Edit Content</a></li>

</ul>

<!-- Tab panes -->
<div class="tab-content">

  <div role="tabpanel" class="tab-pane active" id="basic_details">


    <form id="update" class="col-md-6 col-md-offset-3 margin-top" onsubmit="return validateDetails()" method="post" action={{route('update')}}>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Full Name*</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{$user->fullname}}" required>
  </div>
  <div id="name_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid name!</p>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="{{$user->status}}">
  </div>
  <div id="status_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid Status!</p>
  </div>
  <div class="form-group">
    <label for="school">School</label>
    <input type="text" class="form-control" id="school" name="school" placeholder="School" value="{{$user->school}}">
  </div>
  <div id="school_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid school name!</p>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$user->phone}}">
  </div>
  <div id="phone_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid phone number!</p>
  </div>
  <div class="form-group">
    <label for="fax">Fax</label>
    <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="{{$user->fax}}">
  </div>
  <div id="fax_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid fax number!</p>
  </div>
  <div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$user->url}}">
  </div>
  <div id="url_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid URL!</p>
  </div>
  <div class="form-group">
    <label for="office">Office</label>
    <input type="text" class="form-control" id="office" name="office" placeholder="Office" value="{{$user->office}}">
  </div>
  <div id="office_alert" class="alert alert-danger hidden" role="alert">
 <p>Please enter a valid office name!</p>
  </div>
  <div class="form-group">

  <label class="btn btn-default btn-file">
    Upload Photo
    <input id="photo" name="photo" type="file" style="display: none;">
</label>
</div>
  <button type="submit" class="btn btn-default">Update</button>
  <div id="required_alert" class="alert alert-danger hidden" role="alert">
 <p>Please do not leave the required fields blank!</p>
  </div>
  </form>
  </div>
  <div role="tabpanel" class="tab-pane" id="edit_content">
  </div>
</div>
</div>

@stop
