<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="Enlace, Prevención">
    <meta name="author" content="E.P.">
    <title>Sistema de repositorio online - Enlace Prevención</title>
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(URL::asset('theme-assets/images/ico/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/vendors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/vendors/css/charts/chartist.css')); ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/app-lite.css')); ?>">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('theme-assets/css/pages/datatables.css')); ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <style>

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #262D47;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 25px;
  text-decoration: none;
  font-size: 18px;
  color: #FFFF;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #262D47;
  color: white;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media  screen and (max-height: 450px) {
  .sidebar {padding-top: 50px;}
  .sidebar a {font-size: 18px;}
}
</style>
  </head>
  <body class="vertical-layout fixed-navbar 1-column" data-color="bg-chartbg">

    <!-- fixed-top-->
   <nav class="header-navbar navbar-expand-md fixed-top navbar-semi-light">
      <div class="navbar-wrapper" >
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
               <button class="openbtn" onclick="openNav()">&#9776; Dashboard</button>
               <button class="openbtn" onclick="closeNav()"><i class="la la-arrow-circle-left" title="Cerrar Sidebar"></i></button>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="la la-long-arrow-up"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

          <div id="mySidebar" class="sidebar">
          <li class="nav-item"><a href="<?php echo e(url ('/dashboard')); ?>"><i class="ft-home"></i><span class="menu-title">Inicio</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/miplan')); ?>"><i class="la la-building"></i>Plan Preventivo</a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/miworker')); ?>"><i class="la la-users"></i><span class="menu-title" data-i18n="">Trabajadores</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/miequip')); ?>"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="">Equipamento</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/milocal')); ?>"><i class="la la-building"></i><span class="menu-title" data-i18n="">Instalaciones </span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/midoc')); ?>"><i class="la la-file-word-o"></i><span class="menu-title" data-i18n="">Documentación </span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/perfil')); ?>"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="">Perfil</span></a>
          </li>
          <li class=" nav-item"><a href="<?php echo e(url('/logout')); ?>"><i class="la la-times-circle"></i><span class="menu-title">Logout</span></a>
          </li>
          </li>
          <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title">
          <?php echo e(session('key')); ?></span></a>
          </li>
          </div>


<div id="main">
    <div class="app-content content">
      <div class="content-wrapper" >
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title"><?php echo $__env->yieldContent('ruta'); ?></h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><?php echo $__env->yieldContent('www'); ?>
                  <?php echo $__env->yieldContent('boton'); ?>
                  </li>
                  
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="content-body">
    <section id="basic-alerts">
    <div class="row match-height">
      <div class="col-xl-12 col-lg-12">
        <div class="card">        
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>
    </div>
    </section>
  </div>

<?php echo $__env->yieldContent('content2'); ?>

</div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo e(URL::asset('theme-assets/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo e(URL::asset('theme-assets/vendors/js/charts/chartist.min.js')); ?>" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="<?php echo e(URL::asset('theme-assets/js/core/app-menu-lite.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(URL::asset('theme-assets/js/core/app-lite.js')); ?>" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo e(URL::asset('theme-assets/js/scripts/pages/dashboard-lite.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(URL::asset('theme-assets/js/scripts/datatables.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(URL::asset('theme-assets/js/scripts/bootstrap-select.js')); ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "200px";
      document.getElementById("main").style.marginLeft = "200px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
    </script>
  </body>
</html><?php /**PATH D:\laragon\www\enlace\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>