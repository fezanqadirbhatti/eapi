<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
@section('preload')
    <!-- Bootstrap core CSS -->
    <link href="{{ url('/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('/css/site-main.css') }}" rel="stylesheet">
@show

</head>

<body>

<!-- Navigation -->
@section('nav')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">ECOMMERCE STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ ($pageData['url'] == 'index') ? 'active':''}}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
@show

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Left Sidebar -->
        @section('left-sidebar')
        <div class="col-lg-3">

            <h3 class="my-4">Categories</h3>
            <div class="list-group">
                @foreach($pageData['categories'] as $category)
                <a href="{{ url('/category/'.$category->name) }}" class="list-group-item">{{ ucfirst($category->name) }}</a>
                @endforeach
            </div>

        </div>
        @show
        <!-- /.col-lg-3 -->

        <!-- Right Content -->
        @section('right-content')
        <div class="col-lg-9">
            @section('banner-slider')
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{ url('/images/banner-1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{ url('/images/banner-2.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{ url('/images/banner-3.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @show

            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
            <div class="rows">
                <div class="col-lg-10">
                    @yield('paginate')
                </div>
            </div>
            <!-- /.row -->
        </div>
        @show
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>

<!-- /.container -->

<!-- Footer -->
@section('footer')
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ 'Ecommerce Store' }} {{ date('Y') }}</p>
    </div>
    <!-- /.container -->
</footer>
@show

<!-- Bootstrap core JavaScript -->
@section('lazyload')
<script src="{{ url('/js/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
@show

</body>

</html>
