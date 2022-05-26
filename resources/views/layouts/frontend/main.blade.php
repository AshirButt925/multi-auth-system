<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{config('app.name')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/frontend/assets/img/favicon.png" rel="icon">
    <link href="/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/frontend/assets/css/style.css" rel="stylesheet">
</head>
<body>
@include('layouts.frontend.sections.header')
@yield('content')
@include('layouts.frontend.sections.footer')
<!-- Vendor JS Files -->
<script src="/frontend/assets/vendor/purecounter/purecounter.js"></script>
<script src="/frontend/assets/vendor/aos/aos.js"></script>
<script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/frontend/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/frontend/assets/js/main.js"></script>
</body>
</html>
