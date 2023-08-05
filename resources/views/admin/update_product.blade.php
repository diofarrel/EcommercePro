<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
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
                                <h3 class="card-title">Update Product</h3>
                                <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="preview-list">
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Name </label>
                                                    <input type="text" class="form-control todo-list-input" name="title" placeholder="Write product name..." required value="{{ $product->title }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Description </label>
                                                    <input type="text" class="form-control todo-list-input" name="description" placeholder="Write product description..." required value="{{ $product->description }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Price </label>
                                                    <input type="number" class="form-control todo-list-input" name="price" placeholder="Write product price..." required value="{{ $product->price }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Discount Price </label>
                                                    <input type="number" class="form-control todo-list-input" name="discount_price" placeholder="Write product disc price..." value="{{ $product->discount_price }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Quantity </label>
                                                    <input type="number" min="0" class="form-control todo-list-input" name="quantity" placeholder="Write product quantity..." required value="{{ $product->quantity }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Catagory </label>
                                                    <select class="custom-select" name="catagory" id="" required>
                                                        <option value="{{ $product->catagory }}" selected>{{ $product->catagory }}</option>
                                                        @foreach($catagory as $catagory)
                                                        <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Current Product Image </label>
                                                    <br>
                                                    <img src="/product/{{ $product->image }}" alt="" height="350">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Change Product Image </label>
                                                    <input type="file" class="form-control todo-list-input" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <input onclick="return confirm('Are you sure to update this?')" type="submit" name="submit" class="btn btn-primary" value="Update Product">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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