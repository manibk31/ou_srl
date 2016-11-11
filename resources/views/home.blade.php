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
    <textarea rows="5" class="form-control" id="office"  name="office" value="{{$user->office}}" required></textarea>
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
    <form  class="col-md-6 col-md-offset-3 margin-top" method="post" action="{{route('update_details')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="heading">Education</label>
        <textarea rows="4" class="form-control"   name="education" required>{{$edit_content->education}}</textarea>
        </div>
        <div class="form-group">
          <label for="heading">About</label>
            <textarea rows="12" class="form-control"   name="about" required>{{$edit_content->about}}</textarea>
        </div>
        <div class="form-group">
          <label for="heading">Research Interests</label>
          <textarea rows="5" class="form-control"   name="research" required>{{$edit_content->research}}</textarea>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </form>


<div id="publication_section" class="col-md-6 col-md-offset-3">
    <label for="publication">Publications</label>
    <div class="pull-right"><button id="add_pub" onclick="addPub()" class="btn btn-primary">
    <i class="fa fa-plus"></i> Add another publication
    </button>
    </div>


@if($publication_count==0)
<div id="publication" class="form-group">
<form method="post" action="{{route('publication_nil')}}">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="pill" href="#book">Book</a></li>
<li><a data-toggle="pill" href="#chapter">Chapter</a></li>
<li><a data-toggle="pill" href="#article">Article</a></li>
<li><a data-toggle="pill" href="#conference">Conference</a></li>
</ul>

<div class="tab-content" style="margin-top:10px;">

<div id="book" class="tab-pane fade in active">
<div class="form-group">
<textarea rows="3" class="form-control"  name="book" required></textarea>
</div>
</div>
<div id="chapter" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"  name="chapter" required></textarea>
</div>
</div>
<div id="article" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"   name="article" required></textarea>
</div>
</div>
<div id="conference" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"   name="conference" required></textarea>
</div>
</div>
</div>
<div class="form-group">
<button type="submit"  name="update" class="btn btn-default">Update</button>
</div>
</form>
</div>
@endif

@if ($publication_count==1)
<div id="publication" class="form-group">
<form method="post" action="{{route('publication')}}">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="pill" href="#book">Book</a></li>
<li><a data-toggle="pill" href="#chapter">Chapter</a></li>
<li><a data-toggle="pill" href="#article">Article</a></li>
<li><a data-toggle="pill" href="#conference">Conference</a></li>
</ul>

<div class="tab-content" style="margin-top:10px;">

<div id="book" class="tab-pane fade in active">
<input type="hidden" name="id" value="{{$user_publications->id}}" >
<div class="form-group">
<textarea rows="3" class="form-control"  name="book" required>{{$user_publications->book}}</textarea>
</div>
</div>
<div id="chapter" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"  name="chapter" required>{{$user_publications->chapter}}</textarea>
</div>
</div>
<div id="article" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"   name="article" required>{{$user_publications->article}}</textarea>
</div>
</div>
<div id="conference" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"   name="conference" required>{{$user_publications->conference}}</textarea>
</div>
</div>
</div>
<div class="form-group">
<button type="submit"  name="update" class="btn btn-default">Update</button>
<button  type="submit" name="delete" class="btn btn-default">Delete this entry</button>
</div>
</form>
</div>


@else

@foreach ($user_publications as $publication)

  <div id="publication" class="form-group">
<form method="post" action="{{route('publication')}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="pill" href="#book">Book</a></li>
<li><a data-toggle="pill" href="#chapter">Chapter</a></li>
<li><a data-toggle="pill" href="#article">Article</a></li>
<li><a data-toggle="pill" href="#conference">Conference</a></li>
</ul>

<div class="tab-content" style="margin-top:10px;">

<div id="book" class="tab-pane fade in active">
<input type="hidden" name="id" value="{{$publication->id}}">
<div class="form-group">
  <textarea rows="3" class="form-control"  name="book" required>{{$publication->book}}</textarea>
</div>
</div>
<div id="chapter" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"    name="chapter" required>{{$publication->chapter}}</textarea>
</div>
</div>
<div id="article" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"   name="article" required>{{$publication->article}}</textarea>
</div>
</div>
<div id="conference" class="tab-pane fade">
<div class="form-group">
<textarea rows="3" class="form-control"  name="conference" required>{{$publication->conference}}</textarea>
</div>
</div>
</div>
<div class="form-group">
  <button type="submit"  name="update" class="btn btn-default">Update</button>
  <button  type="submit" name="delete" class="btn btn-default">Delete this entry</button>
</div>
</form>
</div>
@endforeach

@endif
</div>
<div id="links_section" class="col-md-6 col-md-offset-3">
  <label for="link">External links</label>
  <div style="margin-bottom:10px;" class="pull-right"><button id="add_pub" onclick="addLink()" class="btn btn-primary">
  <i class="fa fa-plus"></i> Add another link
  </button>
  </div>
  <div id="links">
  <form>
  <div style="margin-top:10px;" class="form-group">
    <input type="text" class="form-control" id="link" name="link[]"  required>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-default">Update</button>
  <button  class="btn btn-default">Delete this entry</button>
  </div>

</form>
</div>
<div>
</div>
</div>
</div>
</div>
</div>

@stop
