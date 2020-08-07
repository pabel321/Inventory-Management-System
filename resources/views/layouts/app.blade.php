<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Base Css Files -->
        <link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- Font Icons -->
        <link href="{{asset('public/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
        <!-- animate css -->
        <link href="{{asset('public/admin/css/animate.css')}}" rel="stylesheet" />
        <!-- Waves-effect -->
        <link href="{{asset('public/admin/css/waves-effect.css')}}" rel="stylesheet">
        <!-- Custom Files -->
        <link href="{{asset('public/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('public/admin/js/modernizr.min.js')}}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <!-- DataTables -->
        <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    
</head>
<body>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
                        <!-- Authentication Links -->
                        @guest
                            
                        @else
                            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><i class="md md-terrain"></i> <span> Inventory </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                 
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{URL::to('public/admin/images/IMG_0447.jpg')}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('allEmployee')}}"><i class="md md-face-unlock"></i>   Show Employees<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="{{route('setting')}}"><i class="md md-settings"></i> Settings</a></li>
                                     <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">

                <div class="sidebar-inner slimscrollleft">
                    
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fas fa-users"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addEmployee')}}">Add Employee</a></li>  
                                    <li><a href="{{route('allEmployee')}}">All Employee</a></li>               
                                </ul>
                            </li>


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Customers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addCustomer')}}">Add Customer</a></li>
                                    <li><a href="{{route('allCustomer')}}">All Customer</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addSupplier')}}">Add Supplier</a></li>
                                    <li><a href="{{route('allSupplier')}}">All Supplier</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Salary (EMP) </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addAdvancedSalary')}}">Add Advanced Salary</a></li>
                                    <li><a href="{{route('allAdvancedSalary')}}">All Advanced Salary</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Categories </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addCategory')}}">Add Category</a></li>
                                    <li><a href="{{route('allCategory')}}">All Category</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Products </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addProduct')}}">Add Product</a></li>
                                    <li><a href="{{route('allProduct')}}">All Product</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Expenses </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('addExpense')}}">Add New</a></li>
                                    <li><a href="{{route('todayExpense')}}">Today Expense</a></li>
                                   <li><a href="{{route('monthlyExpense')}}">Monthly Expense</a></li>
                                   <li><a href="{{route('yearlyExpense')}}">Yearly Expense</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Attendance </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('takeAttendance')}}">Take Attendance</a></li>
                                    <li><a href="{{route('allAttendance')}}">All Attendance</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Settings </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('setting')}}">Settings</a></li>
                                </ul>
                            </li>

                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
                                @endguest

                           </div>

         
        <main class="py-4">
            @yield('content')
        </main>
    </div>

<script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="{{asset('public/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/admin/js/waves.js')}}"></script>
        <script src="{{asset('public/admin/js/wow.min.js')}}"></script>
        <script src="{{asset('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/admin/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/admin/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/admin/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>
        <!-- sweet alerts -->
        
        <!-- flot Chart -->
        
        <!-- Counter-up -->
        <script src="{{asset('public/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>   
        <!-- CUSTOM JS -->
        <script src="{{asset('public/admin/js/jquery.app.js')}}"></script>
        <!-- Dashboard -->
        <script src="{{asset('public/admin/js/jquery.dashboard.js')}}"></script>
        <!-- Chat -->
        <!-- Todo -->
        <script src="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

          <script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
    </script>

    <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
    

</body>

</html>
