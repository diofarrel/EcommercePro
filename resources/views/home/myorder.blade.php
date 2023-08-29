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

        <div class="table-responsive" style="margin:auto; width:80%;">
            <table class="table" style="margin-top: 2rem; margin-bottom: 2rem;">
                <thead>
                    <tr>
                        <th> Order ID </th>
                        <th> Tanggal Pesanan </th>
                        <th> Nama Pemesan </th>
                        <th> Total Harga </th>
                        <th> Address </th>
                        <th> Action </th>
                    </tr>
                </thead>
                @foreach ($order as $order)
                <tbody>
                    <tr>
                        <td> # {{ $order->id }} </td>
                        <td> {{ $order->created_at }} </td>
                        <td> {{ $order->name }}</td>
                        <td> {{ $order->total_price }}</td>
                        <td> {{ $order->address }} </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('myorder_detail', $order->id) }}">Detail</a>
                            <a class="btn btn-danger" href="{{ url('print_bill', $order->id) }}">Print Bill</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

        <!-- footer start -->
        @include('home.footer')
        <!-- footer end -->
</body>

</html>