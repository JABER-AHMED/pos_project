        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">HEXit POS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if(Sentinel::check())
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Sentinel::getUser()->name}} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 <form action="{{route('logout')}}" method="post" id="logout-form">
                     {{csrf_field()}}
                    <li><a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a></li>
                  </form>
                </ul>
              </li>
            @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                        <li><a href="{{'/admin/index'}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

                        <li><a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{'/register'}}">Add New User</a></li>
                                <li><a href="{{route('user.list')}}">User List</a></li>
                            </ul>
                        </li>

                        <li><a href="#"><i class="fa fa-list-alt fa-fw"></i> Products <span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li><a href="{{route('product.create')}}">Add New Product</a></li>
                                <li><a href="{{route('product.index')}}">Product List</a></li>
                            </ul>

                        </li>

                        <li><a href="#"><i class="fa fa-wrench fa-fw"></i>Suppliers <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{route('suppliers.index')}}">Suppliers List</a></li>
                                <li><a href="{{route('suppliers.create')}}">Add Suppliers</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('category.index')}}"><i class="fa fa-money fa-fw"></i>CategoryList</a></li>
                        <li><a href="{{route('sells.index')}}"><i class="fa fa-money fa-fw"></i> Sells</a></li>
                    </ul>

                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>