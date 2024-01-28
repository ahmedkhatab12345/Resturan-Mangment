<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Resturant</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{url('/')}}/site/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('/')}}/site/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{url('/')}}/site/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{url('/')}}/site/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('/')}}/site/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('/')}}/site/assets/css/style.css" rel="stylesheet">
    <!-- في ملف العرض blade.blade.php -->
<link href="{{ asset('path-to-select2/css/select2.min.css') }}" rel="stylesheet">
<script src="{{ asset('path-to-select2/js/select2.min.js') }}"></script>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        @include('resturant.include.header')
        @yield('content')
        @include('resturant.include.footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/wow/wow.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/easing/easing.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/counterup/counterup.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{url('/')}}/site/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{url('/')}}/site/assets/js/main.js"></script>
</body>

</html>