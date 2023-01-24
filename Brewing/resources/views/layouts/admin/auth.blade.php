<!doctype html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('sneat/assets')}}"
    data-template="vertical-menu-template-free"
>
<head>
    @yield('meta')
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Hotel Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('sneat/assets/img/favicon/favicon.ico')}}"/>
    <!-- Core style -->
    @include('layouts.admin.style')
    <link rel="stylesheet" href="    {{asset('sneat/assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Custom style -->
    @yield('customStyle')
    <!-- Helpers -->
    <script src="{{asset('sneat/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('sneat/assets/js/config.js')}}"></script>
</head>
<body>
<!-- Layout wrapper -->
@yield('content')
<!-- /Layout wrapper -->
<!-- Core JS -->
@include('layouts.admin.script')
<!-- Custom JS -->
@yield('customScript')
<!-- Sweet Alert -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html>

