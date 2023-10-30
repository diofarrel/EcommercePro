<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="">
    <title>EKA JAYA</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <style>
        .img-size {
            width: 200px !important;
            height: 200px !important;
            border-radius: 12px !important;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <span>CV EKA JAYA TEKSTIL</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('productpage') }}">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('myorder') }}">Order</a>
                            </li>

                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profile.show') }}">Profile</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <input class="" type="submit" value="Logout">
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @endauth
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <div class="table-responsive" style="margin:auto; width:80%;">
            <table class="table" style="margin-top: 2rem; margin-bottom: 2rem;">
                <thead>
                    <tr>
                        <th> Nama Pemesan </th>
                        <th> Tanggal Pesanan </th>
                        <th> Nama Produk </th>
                        <th> Produk </th>
                        <th> Quantity </th>
                        <th> Price </th>
                    </tr>
                </thead>
                @foreach ($orders as $item)
                <tbody>
                    <tr>
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->created_at }} </td>
                        <td> {{ $item->product_title }}</td>
                        <td>
                            <img class="img-fluid img-thumbnail img-size" src="/product/{{ $item->image }}" alt="">
                        </td>
                        <td> {{ $item->quantity }} </td>
                        <td> {{ $item->price }} </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

        <!-- footer start -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="full">
                            <div class="logo_footer">
                                <a href="{{url('/')}}"><img width="100" src="{{asset('images/logo.png')}}" alt="#" /></a>
                            </div>
                            <div class="information_f">
                                <p><strong>TELEPHONE:</strong> 0895803477999</p>
                                <p><strong>EMAIL:</strong> cvekajaya.web@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="widget_menu">
                                            <h3>Menu</h3>
                                            <ul>
                                                <li><a href="{{url('/')}}">Home</a></li>
                                                <li><a href="{{ url('productpage') }}">Products</a></li>
                                                <li><a href="{{ url('show_cart') }}">Cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="widget_menu">
                                            <h3>Account</h3>
                                            <ul>
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="cpy_">
            <p class="mx-auto">© 2023 All Rights Reserved By <a href="{{url('/')}}">CV EKA JAYA</a><br></p>
        </div>
        <!-- jQery -->
        <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
        <!-- popper js -->
        <script src="{{asset('home/js/popper.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('home/js/bootstrap.js')}}"></script>
        <!-- custom js -->
        <script src="{{asset('home/js/custom.js')}}"></script>
        <!-- footer end -->
</body>

</html>