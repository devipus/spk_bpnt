<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dinas Sosial Kota Palembang</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('assets2/img/plg.png') }}" rel="icon">
  <link href="{{ asset('assets2/img/plg.png') }}">
  <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
  <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  <!-- Bootstrap core CSS -->

  <link href="{{ asset('assets/lib/bootstrap/css/bootstraps.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet"   href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <!--external css-->
  <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/gritter/css/jquery.gritter.css') }}"/>
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/lib/chart-master/Chart.js') }}" rel="stylesheet" ></script>
  <script src="{{ asset('assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" ></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>BP<span>NT</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->

        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{ asset('assets/img/user2.png') }}"class="img-circle" width="80"></a></p>
          <h5 class="centered"> Devi Puspitasari</h5>

          <li>
            <a href="{{ url('beranda')}}">
              <i class="fa fa-home"></i>
              <span>Beranda</span>
              </a>
          </li>

          <li >
            <a href="{{ url('pembobotanawal')}}">
              <i class="fa fa-circle-o"></i>
              <span>Kriteria</span>
              </a>
          </li>

          <li >
            <a href="{{ url('kriteria')}}">
              <i class="fa fa-circle-o"></i>
              <span>Sub Kriteria</span>
              </a>
          </li>

          <li >
            <a href="{{ url('warga')}}">
              <i class="fa fa-circle-o"></i>
              <span>Data Usulan</span>
              </a>
          </li>

          <li >
            <a href="{{ url('pembobotan')}}">
              <i class="fa fa-circle-o"></i>
              <span>Penilaian</span>
              </a>
          </li>

          <li >
            <a href="{{ url('hasil')}}">
              <i class="fa fa-bar-chart"></i>
              <span>Hasil</span>
              </a>
          </li>

          <!-- <li >
            <a href="{{ url('uploadfile')}}">
              <i class="fa fa-file"></i>
              <span>Laporan</span>
              </a>
          </li> -->

          <!-- <li >
            <a href="{{ route('viewfile') }}">
              <i class="fa fa-file"></i>
              <span>Laporan</span>
              </a>
          </li> -->

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          @yield('content')
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Devi</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
         
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

  <script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('assets/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('assets/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset('assets/lib/zabuto_calendar.js') }}"></script>
  <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/fastclick/fastclick.js') }}"></script>
  <script src="{{ asset('assets/dist/js/datepicker.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
 
  @yield('script')
</body>

</html>
