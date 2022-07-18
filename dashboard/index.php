<?php
  // periksa apakah user sudah login, cek kehadiran session name 
  // jika tidak ada, redirect ke login.php
  session_start();
  if (!isset($_SESSION["nama"])) {
     header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, icons, etc. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/images/logo1.png" type="image/ico" />

    <title> Sistem Informasi Wisata Kabupaten Klaten </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
            &nbsp; <a href="index.php" class="fa fas fa-database fa-2x" style="color:#229c0d;"><span><font size="5" color="white" face="Trebuchet MS"> ADMINISTRATOR</font></span></a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>Admin KlatenKab</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Objek Wisata <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_wisata">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_wisata">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Data User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_user">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_user">Tambah Data</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/user.png" alt=""><?php echo $_SESSION["nama"] ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="../index.php"> Home</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
      <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'tampil_wisata':
      		# code...
      		include 'tampil_wisata.php';
      		break;
      	case 'tambah_wisata':
      		# code...
      		include 'tambah_wisata.php';
      		break;
        case 'edit_wisata':
        		# code...
        	include 'edit_wisata.php';
        	break;
        case 'delete_wisata':
          	# code...
          include 'delete_wisata.php';
        case 'tampil_user':
            # code...
          include 'tampil_user.php';
          break; 
        case 'tambah_user':
            # code...
          include 'tambah_user.php';
          break;
        case 'edit_user':
            # code...
          include 'edit_user.php';
          break;
          case 'delete_user':
              # code...
          include 'delete_user.php';
          break;
        default:
		          #code...
		      include 'home.php';
		      break;
        }
        ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2022 Sistem Informasi Wisata KlatenKab : Project UAS Pemrograman Berbasis Web Semester 4
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

  </body>
</html>
