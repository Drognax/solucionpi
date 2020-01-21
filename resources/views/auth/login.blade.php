<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Sistema de repositorio online - Enlace Prevención</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{{URL::asset('theme-assets/images/ico/favicon.ico')}}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('assets/css/login.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/vendors.css')}}}">

    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/vendors/css/charts/chartist.css')}}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/core/menu/menu-types/vertical-menu.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/core/colors/palette-gradient.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{URL::asset('theme-assets/css/pages/dashboard-ecommerce.css')}}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
   <body>
@include('errors')
   <div class="sidenav">
         <div class="login-main-text">
            <h1>Sistema de Repositorio Online<br></h1> 
            <h2>Enlace Prevención</h2><br>
            <p>Ingresa al Sistema</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">          
            <div class="login-form">
               <form method="POST" action="{{URL('checkin')}}">
                    {{ csrf_field() }}
                  <div class="form-group">
                     <label>Usuario:</label>
                     <input type="email" name="email" class="form-control" placeholder="Usuario" required="required">
                  </div>
                  <div class="form-group">
                     <label>Contraseña:</label>
                     <input type="password" name="password" class="form-control" placeholder="Contraseña" required="required">
                  </div>
                  <button type="submit" class="btn btn-black">Entrar</button>
               </form>
            </div>
         </div>
      </div>   

   </body>
   <div class="footer">
      <span class="fa-stack">
          <a href="https://www.facebook.com/Enlace-Prevención-109797053827023/">
              <span class="hexagon"></span>
              <i class="la la-facebook la-10x"></i>
          </a>
      </span>
      <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
       <li class="list-inline-item"><a class="my-1" href="https://enlaceprevencion.cl/" target="_blank"> Enlace Prevención 2020</a></li>
     </ul>
   </div>

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
    <!-- END PAGE LEVEL JS-->
  </body>
</html>