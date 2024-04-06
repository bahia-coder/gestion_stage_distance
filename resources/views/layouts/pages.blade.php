<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.head')
    <link href="{{ URL::asset('assets/css/reset-password.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content">

        @yield('content')
  </div>
</div>

@include('layouts.footer-scripts')

</body>
</html>
