<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">  --}}
    <title>@yield('page') | {{env('APP_NAME')}}</title>
    <!-- Favicons-->
    <link rel="icon" href="/assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="/assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    @section('css')
    <!-- CORE CSS-->
    <link href="/assets/css/themes/collapsible-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/themes/collapsible-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="/assets/css/custom/custom.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/layouts/page-center.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendors/sweetalert/dist/sweetalert.css">
    @show
  </head>
  <body class="cyan">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

@yield('content')

@section('js')
<!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="/assets/vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="/assets/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="/assets/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="/assets/js/custom-script.js"></script>
    <script type="text/javascript" src="/assets/js/scripts/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/scripts/additional-methods.min.js"></script>
    <script type="text/javascript" src="/assets/vendors/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/assets/js/scripts/extra-components-sweetalert.js"></script>
    <script>
      $.validator.setDefaults({
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
      });

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
@show
  </body>
</html>
