<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logo/logo_rline_petit_black.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?= $title ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="vendor/ctdashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="vendor/ctdashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="vendor/ctdashboard/assets/css/demo.css" rel="stylesheet" />

  <script src="vendor/ctdashboard/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="sidebar" data-image="assets/img/background/foot.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                    <img src="assets/img/logo/logo_rline_petit.png" height="30px"/>
                </a>
                <a href="/" class="simple-text logo-normal">
                    RlinePronos
                </a>
            </div>
            <div class="user">
                <div class="info ">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span class="text-center"><?= $_SESSION['firstname'].' '.$_SESSION['lastname']?></span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <!-- <li class="nav-item ">
                    <a class="nav-link" href="./dashboard.html">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Dashboard</p>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
<!-- Navbar -->
<div class="main-panel">

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-default btn-fill btn-round btn-icon d-none d-lg-block">
                    <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= $title ?></a>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <!-- <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-bell-55"></i>
                        <span class="notification">1</span>
                        <span class="d-lg-none">Notification</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Bienvenu sur votre nouveau espace admin</a>
                    </ul>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-zoom-split"></i> Action
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?=RACINE.'rlinepronos.fr'?>">
                            <i class="nc-icon nc-stre-up"></i>Site Web
                        </a>
                        <a class="dropdown-item" href="<?=RACINE.'premium.rlinepronos.fr'?>">
                            <i class="nc-icon nc-stre-down"></i>Espace VIP
                        </a>
                        <div class="divider"></div>
                        <a href="/me-deconnecter" class="dropdown-item text-danger">
                            <i class="nc-icon nc-button-power"></i>Deconnection
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- End Navbar -->



    <div class="container">
        <?= $content ?>
    </div>
    </div>

</body>


<script src="vendor/ctdashboard/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="vendor/ctdashboard/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="vendor/ctdashboard/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector Map  -->
<script src="vendor/ctdashboard/assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="vendor/ctdashboard/assets/js/plugins/moment.min.js"></script>
<!--  DatetimePicker   -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet Alert  -->
<script src="vendor/ctdashboard/assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags Input  -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders  -->
<script src="vendor/ctdashboard/assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="vendor/ctdashboard/assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="vendor/ctdashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrap Table Plugin -->
<script src="vendor/ctdashboard/assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTable Plugin -->
<script src="vendor/ctdashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Calendar   -->
<script src="vendor/ctdashboard/assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="vendor/ctdashboard/assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="vendor/ctdashboard/assets/js/demo.js"></script>


</html>