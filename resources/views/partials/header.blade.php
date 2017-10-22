
	<nav class="navbar navbar-default" role="navigation">
    <div class="container">
	  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/home">POS System</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
    @if(Sentinel::check())
       <li class="dropdown">
        <a style="margin-top: 10px;" href="#" class="dropdown-toggle" data-toggle="dropdown">{{Sentinel::getUser()->name}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
         <form action="{{route('logout')}}" method="post" id="logout-form">
             {{csrf_field()}}
            <li class="text-center"><a style="padding: 0; text-decoration: none;" href="#" onclick="document.getElementById('logout-form').submit()">Logout</a></li>
          </form>
        </ul>
      </li>
    @endif
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>