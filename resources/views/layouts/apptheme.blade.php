<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{config('app.name')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/apptheme/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/apptheme/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/apptheme/_all-skins.min.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/datatables/dataTables.bootstrap.css')}}">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url('images/shiva.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Suraj</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/shiva.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/shiva.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome Suraj!</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
         <li id="dashboard">
          <a href="../widgets.html">
            <i class="fa fa-th"></i> <span>Home</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>
        <li class="header text-center" ><b>Stock</b></li>
        <li id = "items" class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Items</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id ="additems"><a href="{{ action('Items\ItemsController@create') }}"><i class="fa fa-circle-o"></i>Add Items</a></li>
            <li id ="viewitems"><a href="{{ action('Items\ItemsController@index') }}"><i class="fa fa-circle-o"></i>VIew Items</a></li>
          </ul>
        </li>
        <li class="header text-center" ><b>Purchase Section</b></li>
        <li id="debtors" class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Debtors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="adddebtors" ><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Debtors</a></li>
            <li id="viewdebtors" ><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Debtors</a></li>
          </ul>
        </li>
         <li id="pbills"  class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Purchase Bills</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addpbills"><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Purchase Bills</a></li>
            <li id="viewpbills"><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Purchase Bills</a></li>
          </ul>
        </li>
         <li id="preceipts" class="treeview">
          <a href="#">
            <i class="fa  fa-file-text-o"></i> <span>Purchase Receipts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addpreceipts"><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Purchase Receipts</a></li>
            <li id="viewpreceipts"><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Purchase Receipts</a></li>
          </ul>
        </li>
        <li class="header text-center" ><b>Sales Section</b></li>
        <li id="creditors" class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Creditors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addcreditors"><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Creditors</a></li>
            <li id="viewcreditors"><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Creditors</a></li>
          </ul>
        </li>
         <li id="sbills" class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Sales Bills</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addsbills"><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Sales Bills</a></li>
            <li id="viewsbills"><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Sales Bills</a></li>
          </ul>
        </li>
         <li id="sreceipts" class="treeview">
          <a href="#">
            <i class="fa  fa-file-text-o"></i> <span>Sales Receipts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addsreceipts"><a href="../../index.html"><i class="fa fa-circle-o"></i>Add Sales Receipts</a></li>
            <liid="viewsreceipts"><a href="../../index2.html"><i class="fa fa-circle-o"></i>View Sales Receipts</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        {{$heading}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    @yield('content')
    @include('inc.errormessage')

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://www.surajregmi.com.np">Suraj Regmi</a>.</strong> All rights
    reserved.
  </footer>


<!-- jQuery 2.2.3 -->
<script src="{{asset('js/apptheme/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('js/apptheme/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('js/apptheme/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/apptheme/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/apptheme/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/apptheme/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
  <script type="text/javascript">


    $(".treeview-menu li ").click(function () {
           var id = $(this).attr("id");
           var  parent = $('#' + id).parent().parent().parent().find(".active").attr("id");
       
          // $('#'+parent).siblings().find(".active").removeClass("active");
          // $('#'+parent).addClass("active");
           localStorage.setItem("selectedparent", parent);
   
           $('#' + id).siblings().find(".active").removeClass("active");
           $('#' + id).addClass("active");
           localStorage.setItem("selectedolditem", id);
   
     });
   
      window.onload = function () {
      // alert("Hiii");
       var selectedparent = localStorage.getItem("selectedparent");
       var selectedolditem = localStorage.getItem('selectedolditem');
       if(selectedparent !=null){
   
            var par = $('#' + selectedparent).parent().find(".active").attr("id");
            $('#' + selectedparent).parent().find(".active").removeClass("active");
            $('#' + selectedparent).addClass("active");
   
           $('#' + selectedolditem).parent().find(".active").removeClass("active");
           $('#' + selectedolditem).addClass("active");
   
        }
   
    };
     
   </script>
</body>
</html>
