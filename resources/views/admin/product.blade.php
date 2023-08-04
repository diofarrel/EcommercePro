<!DOCTYPE html>
<html lang="en">

<head>
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
                                <h3 class="card-title">Add Product</h3>

                                <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="preview-list">
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Name </label>
                                                    <input type="text" class="form-control todo-list-input" name="title" placeholder="Write product name..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Description </label>
                                                    <input type="text" class="form-control todo-list-input" name="description" placeholder="Write product description..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Price </label>
                                                    <input type="number" class="form-control todo-list-input" name="price" placeholder="Write product price..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Discount Price </label>
                                                    <input type="number" class="form-control todo-list-input" name="discount_price" placeholder="Write product disc price...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Quantity </label>
                                                    <input type="number" min="0" class="form-control todo-list-input" name="quantity" placeholder="Write product quantity..." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Catagory </label>
                                                    <select class="custom-select" name="catagory" id="" required>
                                                        <option value="" selected>Add product category...</option>
                                                        @foreach($catagory as $catagory)
                                                        <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <input type="text" class="form-control todo-list-input" name="catagory" placeholder="Write product name..."> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item border-bottom">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <label class="form-check-label mb-3"> Product Image </label>
                                                    <input type="file" class="form-control todo-list-input" name="image" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="preview-item">
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- <form class="add-items d-flex" action="{{ url('/add_catagory') }}" method="POST">
                                    @csrf
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Catagory">
                                </form> -->
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