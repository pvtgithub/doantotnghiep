
<meta charset="utf-8">
<title>Admination - WineDN</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">
<link rel="shortcut icon" href="{{URL::asset('assets/images/products/camus1.png')}}"/>

<base href="/admin/">
<!-- Favicon -->
<link href="{{URL::asset('style_admin/img/favicon.ico')}}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="{{URL::asset('https://fonts.googleapis.com')}}">
<link rel="preconnect" href="{{URL::asset('https://fonts.gstatic.com')}}" crossorigin>
<link href="{{URL::asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap')}}" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')}}" rel="stylesheet">

<!-- Libraries Stylesheet -->
<!-- Customized Bootstrap Stylesheet -->
<link href="{{URL::asset('style_admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/check-out.css')}}">

<!-- Template Stylesheet -->
<link href="{{URL::asset('style_admin/css/style.css')}}" rel="stylesheet">
<link href="{{URL::asset('style_admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('style_admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

<script src="{{URL::asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
<script src="{{URL::asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/chart/chart.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/easing/easing.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{URL::asset('style_admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{URL::asset('//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css')}}">

<!-- CDN alertifyjs -->
<script src="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js')}}"></script>
<!-- CSS -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css')}}"/>
<!-- Default theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css')}}"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css')}}"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css')}}"/>

<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css')}}"/>
<!-- Default theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css')}}"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css')}}"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="{{URL::asset('//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css')}}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- CDN HTML2CANVAS -->
<script type="text/javascript" src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js')}}"></script>
@yield('css')