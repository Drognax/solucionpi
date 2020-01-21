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
    <link rel="shortcut icon" type="image/x-icon" href="{{{URL::asset('theme-assets/images/ico/favicon.ico')}}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/vendors.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/vendors/css/charts/chartist.css')}}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/app-lite.css')}}}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/core/menu/menu-types/vertical-menu.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/core/colors/palette-gradient.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/pages/dashboard-ecommerce.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/pages/datatables.css')}}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
   <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="la la-long-arrow-up"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{{URL::asset('theme-assets/images/backgrounds/02.jpg')}}}">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url ('/dashboard')}}"><img class="brand-logo" alt="Enlace Prevención Logo" src="{{{URL::asset('../theme-assets/images/logo/logo.png')}}}"/>
              <h4 class="brand-text">Dashboard</h4></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item"><a href="{{url ('/dashboard')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Inicio</span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/miplan') }}"><i class="la la-building"></i><span class="menu-title" data-i18n="">Plan Preventivo</span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/miworker') }}"><i class="la la-users"></i><span class="menu-title" data-i18n="">Trabajadores</span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/miequip') }}"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="">Equipamento</span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/milocal') }}"><i class="la la-building"></i><span class="menu-title" data-i18n="">Instalaciones </span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/midoc') }}"><i class="la la-file-word-o"></i><span class="menu-title" data-i18n="">Documentación </span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/perfil') }}"><i class="la la-user-secret"></i><span class="menu-title" data-i18n="">Perfil</span></a>
          </li>
          <li class=" nav-item"><a href="{{ url('/logout') }}"><i class="la la-times-circle"></i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>

          </li>
          <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title" data-i18n="">
          {{ session('key') }}</span></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">@yield('ruta')</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">@yield('www')
                  @yield('boton')
                  </li>
                  
                </ol>
              </div>
            </div>
          </div>
        </div>
<div class="content-body">
  <section id="basic-alerts">
  <div class="row match-height">
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        
        @yield('content')

      </div>


    </div>
  </div>
  


</section>
</div>
@yield('content2')

</div></div>
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2018  &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
        <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
          <li class="list-inline-item"><a class="my-1" href="https://enlaceprevencion.cl/" target="_blank"> Enlace Prevención 2020</a></li>
        </ul>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{{URL::asset('theme-assets/vendors/js/vendors.min.js')}}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{{URL::asset('theme-assets/vendors/js/charts/chartist.min.js')}}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{{URL::asset('theme-assets/js/core/app-menu-lite.js')}}}" type="text/javascript"></script>
    <script src="{{{URL::asset('theme-assets/js/core/app-lite.js')}}}" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{{URL::asset('theme-assets/js/scripts/pages/dashboard-lite.js')}}}" type="text/javascript"></script>
    <script src="{{{URL::asset('theme-assets/js/scripts/datatables.js')}}}" type="text/javascript"></script>
    <script src="{{{URL::asset('theme-assets/js/scripts/bootstrap-select.js')}}}" type="text/javascript"></script>
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
  </body>
</html>