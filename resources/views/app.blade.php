<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" type="text/css" href="http://kobranzas.co/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/all.css') }}">
        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        @inertia
        <script src="http://kobranzas.co/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="http://kobranzas.co/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="http://kobranzas.co/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://kobranzas.co/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="http://kobranzas.co/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="http://kobranzas.co/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="http://kobranzas.co/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="http://kobranzas.co/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="http://kobranzas.co/plugins/moment/moment.min.js"></script>
        <script src="http://kobranzas.co/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="http://kobranzas.co/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="http://kobranzas.co/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="http://kobranzas.co/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


        <!-- overlayScrollbars -->
        <script src="http://kobranzas.co/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="http://kobranzas.co/js/adminlte.min.js"></script>
        <script src="http://kobranzas.co/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="http://kobranzas.co/js/demo.js"></script>
    </body>
</html>
