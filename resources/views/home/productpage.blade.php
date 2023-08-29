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
    <link rel="shortcut icon" href="images/logo.png" type="">
    <title>EKA JAYA</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our <span>products</span>
                    </h2>
                </div>
                <div class="row">
                    @foreach($product as $products)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{ url('product_details', $products->id) }}" class="option1">
                                        Product Details
                                    </a>
                                    <!-- <a href="" class="option2">
                                Buy Now
                            </a> -->

                                </div>
                            </div>
                            <div class="img-box">
                                <img src="product/{{ $products->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>{{ $products->title }}</h5>
                            </div>
                            <div class="detail-box">
                                <p>{{ $products->description }}</p>
                            </div>
                            <div class="detail-box">
                                @if($products->discount_price != null)
                                <h6>IDR. {{ $products->discount_price }}</h6>
                                <h6 style="text-decoration: line-through; font-weight: 300; color:#002c3e;">IDR. {{ $products->price }}</h6>
                                @else
                                <h6>IDR. {{ $products->price }}</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <span style="padding: 25px;">
                    {!!$product->links()!!}
                </span>
            </div>
        </section>


        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
</body>

</html>