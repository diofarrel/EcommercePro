<!DOCTYPE html>
<html>

<head>
     <base href="/public">
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
     {{-- @dd(explode(',', $product->size)); --}}
     <div class="hero_area">
          <!-- header section strats -->
          @include('home.header')
          <!-- end header section -->
          <section style="margin-top: 5rem; background-color: #fff;" class="arrival_section">
               <div class="container">
                    <div class="box">
                         <div class="arrival_bg_box">
                              <img style="object-fit: contain; object-position: center;" src="product/{{ $product->image }}" alt="">
                         </div>
                         <div class="row">
                              <div class="col-md-6 ml-auto">
                                   <div class="heading_container remove_line_bt">
                                        <h2>{{ $product->title }}</h2>
                                   </div>
                                   <p style="margin-top: 20px;margin-bottom: 30px;">{{ $product->description }}</p>
                                   @if ($product->discount_price != null)
                                        <h5 style="text-decoration: line-through; font-weight: 300; color:#002c3e;">IDR. {{ $product->price }}</h5>
                                        <h2 style="color:#f7444e;">IDR. {{ $product->discount_price }}</h2>
                                   @else
                                        <h2>IDR. {{ $product->price }}</h2>
                                   @endif

                                   <form style="margin-top: 3rem;" action="{{ url('add_cart', $product->id) }}" method="POST">
                                        @csrf
                                        <?php
                                        $size = explode(',', $product->size);
                                        ?>
                                        <div>
                                             <label>Size Product</label> <br>
                                             @foreach ($size as $item)
                                                  <input type="radio" name="size" value="{{ $item }}" style="width: auto">
                                                  <label>{{ $item }}</label><br>
                                             @endforeach

                                        </div>
                                        <div>
                                             <label for="quantity">Add Quantity</label>
                                             <input type="number" name="quantity" value="1" min="1">
                                             <input type="submit" value="Add to Cart" style="float: left;">
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
     </div>

     <!-- footer start -->
     @include('home.footer')
     <!-- footer end -->
</body>

</html>
