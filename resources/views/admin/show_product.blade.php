<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .img-size {
            width: 200px !important;
            height: 200px !important;
            border-radius: 12px !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Product</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> ID Product </th>
                                                <th> Product Name </th>
                                                <th> Description </th>
                                                <th> Quantity </th>
                                                <th> Catagory </th>
                                                <th> Price </th>
                                                <th> Discount Price </th>
                                                <th> Product Image </th>
                                                <th> Edit </th>
                                                <th> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $product)
                                            <tr>
                                                <td> {{ $product->id }} </td>
                                                <td> {{ $product->title }} </td>
                                                <td> {{ $product->description }} </td>
                                                <td> {{ $product->quantity }} </td>
                                                <td> {{ $product->catagory }} </td>
                                                <td> {{ $product->price }} </td>
                                                <td> {{ $product->discount_price }} </td>
                                                <td>
                                                    <img class="img-size" src="/product/{{ $product->image }}" alt="">
                                                </td>
                                                <td>
                                                    <a onclick="" class="btn btn-warning" href="{{ url('update_product', $product->id) }}">Edit</a>
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{ url('delete_product', $product->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>