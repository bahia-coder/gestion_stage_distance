<!-- Title -->
<title>@yield("title")</title>


<link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.min.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  @yield('css')

  <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
