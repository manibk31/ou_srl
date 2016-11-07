<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OU Systems Realization Lab</title>
        <script  src={{asset('js/jquery.js')}}></script>
        <script src="{{asset('js/app.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">-->



        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href={{asset('css/bootstrap/css/bootstrap.min.css')}}>

<!-- Optional theme -->
<link rel="stylesheet" href={{asset('css/bootstrap/css/bootstrap-theme.min.css')}}>
<!-- Latest compiled and minified JavaScript -->
<script src={{asset('css/bootstrap/js/bootstrap.min.js')}} ></script>


    </head>

    <body>
        @include('templates.header')
        <div id="wrapper" class="container">
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
       @yield('content')
       </div>
       @include('templates.footer')
    </body>

</html>
