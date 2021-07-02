<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zorro | @yield('title')</title>
    <!--Css-->
    <link rel="stylesheet" href="{{asset('ui/css/bootstrap.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('ui/css/comon-style.css')}}">
    <link rel="stylesheet" href="{{asset('ui/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('ui/css/responsive.css')}}">
    <style>
      ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-thumb {
        background: #856544;
        border: 2px solid #856544;
        border-radius: 50px; 
      }
    </style>

    {{-- <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuZ9AcP4PHUBgbUsT6PdCRUUkyczJ66I&libraries=places,geometry"></script>
    
</head>
<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-none">
    <a class="navbar-brand text-center pt-0 pt-md-5" href="javascript:void(0);"><img src="{{asset('ui/img/left-nav-logo.png')}}" class="pt-0 pt-md-3"></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 d-block d-md-none" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <div class="bg-light-yellow d-flex ml-2">
      <form class="d-none d-md-block pl-3">
          <div class="input-group top-search">
              <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
              <div class="search-icon">
                  <i class="fas fa-search"></i>
              </div>
          </div>
      </form>
      
      <!-- Navbar-->
      <ul class="navbar-nav justify-content-end ml-auto">
        <li class="pt-2">
          <a href="{{route('admin.view_bookings')}}" role="button" class="btn order-btn">Place Order</a>
        </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle user-img" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('ui/img/userpic.jpg')}}"></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <!-- <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="{{ route('admin.change_password') }}">Change Password</a>
                  <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="{{ route("admin.logout") }}">Logout</a>
              </div>
          </li>
      </ul>
    </div>
  </nav><!--top-navmenu-->
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
              <div class="nav">
                  <div class="sb-sidenav-menu-heading user-name">Welcome <span class="d-block">{{\Auth::guard('admin')->user()->name}}</span></div>
                  <a class="nav-link active" href="{{route('admin.dashboard')}}">
                      <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                      Dashboard
                  </a>
                  <a class="nav-link active" href="{{route('admin.manage_bookings')}}">
                      <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                      Order Sheet
                  </a>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts11" aria-expanded="false" aria-controls="collapseLayouts11">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Business Database
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts11" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{route('admin.business.index')}}">Business List</a>
                      <a class="nav-link" href="{{route('admin.business.create')}}">Add Business</a>  
                    </nav>
                  </div>
                  <!-- <a class="nav-link active" href="{{route('admin.dashboard')}}">
                      <div class="sb-nav-link-icon"><i class="fas clipboard-list"></i></div>
                      Dashboard
                  </a> -->
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Rider Database
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('admin.manage_drivers')}}">Rider List</a>
                        <a class="nav-link" href="{{route('admin.driver_view')}}">Add Rider</a>  
                      </nav>
                  </div>

                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Customer Database
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{route('admin.customer.index')}}">Customer List</a>
                      <a class="nav-link" href="{{route('admin.customer.create')}}">Add Customer</a>  
                    </nav>
                  </div>

                  <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts0" aria-expanded="false" aria-controls="collapseLayouts0">
                      <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                      Bookings
                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts0" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="{{route('admin.view_bookings')}}">Add Booking</a>
                          <a class="nav-link" href="{{route('admin.manage_bookings')}}">Manage Booking</a>
                      </nav>
                  </div> -->

                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Vehicle
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="{{route('admin.vehicletype_view')}}">Add Vehicle</a>
                          <a class="nav-link" href="{{route('admin.manage_vehicles')}}">Manage Vehicle</a>
                      </nav>
                  </div>

                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Job Timings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="{{route('admin.jobtiming_view')}}">Add Job Timing</a>
                          <a class="nav-link" href="{{route('admin.manage_jobtiming')}}">Manage Job Timing</a>
                      </nav>
                  </div>

                  

                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                    Area
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="{{route('admin.area_view')}}">Add Area</a>
                          <a class="nav-link" href="{{route('admin.manage_areas')}}">Manage Area</a>
                      </nav>
                  </div>
                  {{-- <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                      Business Database
                  </a> --}}
              </div>
          </div>
          <div class="sb-sidenav-footer">
            <a href="{{ route("admin.logout") }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
      </nav>
    </div><!--Left-Navmenu-->
    <div id="layoutSidenav_content">
      
      @yield('content')

    </div><!--right-section-->
  </div><!--admin-body-->

    <!--Script-->
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
    
    @yield('script')

		<script type="text/javascript" src="{{asset('ui/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/Bootstrap.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/smoothscroll.js')}}"></script>
		<script type="text/javascript" src="{{asset('ui/js/custom.js')}}"></script>
</body>
</html>