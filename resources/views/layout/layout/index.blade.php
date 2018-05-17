<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Laravel Khoa Pham</title>
    <base href="{{asset('')}}">
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/css/shop-homepage.css" rel="stylesheet">
    <link href="front/css/my.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    
	@include('layout.layout.header')
    <!-- Page Content -->
    <div class="container">
         @yield('content')
    </div>
   
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    @include('layout.layout.footer')
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="front/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/my.js"></script>
	@yield('script')
</body>

</html>
