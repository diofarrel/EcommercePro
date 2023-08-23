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
     <link rel="shortcut icon" href="images/favicon.png" type="">
     <title>Famms - Fashion HTML Template</title>
     <!-- bootstrap core css -->
     <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
     <!-- font awesome style -->
     <link href="home/css/font-awesome.min.css" rel="stylesheet" />
     <!-- Custom styles for this template -->
     <link href="home/css/style.css" rel="stylesheet" />
     <!-- responsive style -->
     <link href="home/css/responsive.css" rel="stylesheet" />

     <style>
          .img-size {
               width: 200px !important;
               height: 200px !important;
               border-radius: 12px !important;
          }

          .btn-box a {
               display: inline-block;
               padding: 10px 45px;
               background-color: #f7444e;
               border: 1px solid #f7444e;
               color: #ffffff;
               border-radius: 0;
               -webkit-transition: all 0.3s;
               transition: all 0.3s;
          }

          .btn-box a:hover {
               background-color: transparent;
               color: #f7444e;
          }
     </style>
</head>

<body>
     <div class="hero_area">
          <!-- header section strats -->
          @include('home.header')
          <!-- end header section -->

          @if (session()->has('message'))
               <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
               </div>
          @endif

          <div class="table-responsive" style="margin:auto; width:80%;">
               <table class="table" style="margin-top: 2rem; margin-bottom: 2rem;">
                    <thead>
                         <tr>
                              <th> Product Title </th>
                              <th> Size </th>
                              <th> Product Quantity </th>
                              <th> Price </th>
                              <th> Image </th>
                              <th> Action </th>
                         </tr>
                    </thead>
                    <?php $totalprice = 0; ?>
                    @foreach ($cart as $cart)
                         <tbody>
                              <tr>
                                   <td> {{ $cart->product_title }} </td>
                                   <td> {{ $cart->size }}</td>
                                   <td> {{ $cart->quantity }} </td>
                                   <td> {{ $cart->price }} </td>
                                   <td>
                                        <img class="img-fluid img-thumbnail img-size" src="/product/{{ $cart->image }}" alt="">
                                   </td>
                                   <td>
                                        <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{ url('/remove_cart', $cart->id) }}">Delete Item</a>
                                   </td>
                              </tr>
                         </tbody>
                         <?php $totalprice = $totalprice + $cart->price; ?>
                    @endforeach
               </table>

               <div class="heading_container">
                    <h3>Total Pembayaran</h3>
               </div>

               <div class="form_sub">
                    <form>
                         <fieldset>
                              <div class="field">
                                   <input type="number" placeholder="" name="total_price" value="{{ $totalprice }}" disabled />
                              </div>
                              <div class="field" style="margin-bottom: 5rem; float: left">
                                   <div class="btn-box">
                                        <a href=" {{ url('checkout') }} " class="btn1">
                                             Checkout Sekarang
                                        </a>
                                   </div>
                              </div>
                         </fieldset>
                    </form>
               </div>
          </div>

          <!-- footer start -->
          @include('home.footer')
          <!-- footer end -->
          <div class="cpy_">
               <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                    Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

               </p>
          </div>
          <!-- jQery -->
          <script src="home/js/jquery-3.4.1.min.js"></script>
          <!-- popper js -->
          <script src="home/js/popper.min.js"></script>
          <!-- bootstrap js -->
          <script src="home/js/bootstrap.js"></script>
          <!-- custom js -->
          <script src="home/js/custom.js"></script>
</body>

</html>
