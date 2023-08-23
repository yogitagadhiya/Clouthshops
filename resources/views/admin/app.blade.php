<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>



    <!-- Custom fonts for this template-->
    <link href="{{asset('theme/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{asset('theme/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/admin/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <script src="{{asset('theme/admin/vendor/jquery/jquery.min.js')}}"></script>
    <link href="{{asset('theme/admin/css/summernote-bs4.min.css')}}" rel="stylesheet">


    <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-secondary accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3 text-light">Admin Panel </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-light" href="{{url('home')}}">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span></a>            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{url('all-products')}}">
                    <i class="bi bi-cart4"></i>
                    <span>product</span></a>            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{url('all-categories')}}">
                    <i class="bi bi-images"></i>
                    <span>Categories</span></a>            </li>
            <!-- Nav Item - Tables -->
            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        
                        <div class="topbar-divider d-none d-sm-block "></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow bg-dark">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 small">Logout</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('theme/admin/img/undraw_profile.svg')}}">                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right  shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="{{url('admin-logout')}}"  >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2  text-gray-400"></i>
                                    Logout </a>                                     
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">                    </div>
		<style>
#my {

  background-color:#52595D;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 14px 2px;
  width :100%;
border-radius:2.5em;
}
 .tbox
{
border:2px solid #b3b3b3;
background:#dddddd;
width:200px;
border-radius:25px;
-moz-border-radius:25px; 
-moz-box-shadow:    1px 1px 1px #ccc;
-webkit-box-shadow: 1px 1px 1px 1px #ccc;
 box-shadow:         1px 2px 2px 2px #ccc;
}
</style>

 @yield('content')

 </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('theme/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('theme/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('theme/admin/js/sb-admin-2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Page level plugins -->
    <script src="{{asset('theme/admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('theme/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('theme/admin/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('theme/admin/js/jquery.dataTabless.min.js')}}"></script>
    <script src="{{asset('theme/admin/js/summernote-bs4.min.js')}}"></script>


    <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
    });    

    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script> -->
 

</body>

</html>

