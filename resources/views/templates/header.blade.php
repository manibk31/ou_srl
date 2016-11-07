<div id="header" class="header jumbotron ou_red">
        <div class="container">
           <div class="banner">
              <div class="col-md-6 visible-lg">
                 <img class="img-responsive" src="images/ou_banner.png">
              </div>
              <div class="col-md-2 col-xs-4 hidden-lg">
                 <img class="img-responsive" src="images/ou_logo.png" style="height:50px !important;">
              </div>

           </div>
           @if(Session::has('email'))
           <div class="pull-right"><a href={{route('signout')}}>Sign out</a></div>
           @endif
        </div>
     </div>
