<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     @include('admin.css')
     {{-- @dd($order); --}}
     <style>
          .img-size {
               width: 50px !important;
               height: 50px !important;
               border-radius: 4px !important;
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
                    <div class="row ">
                         <div class="col-12 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <h4 class="card-title">Order Detail</h4>
                                        <div class="table-responsive">
                                             <table class="table">
                                                  <thead>
                                                       <tr>
                                                            <th> Cust. Name </th>
                                                            <th> Email </th>
                                                            <th> Phone </th>
                                                            <th> Address </th>
                                                            <th> Product Title </th>
                                                            <th> Product Image </th>
                                                            <th> Quantity </th>
                                                            <th> Price </th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($orders as $item)
                                                            <tr>
                                                                 <td> {{ $item->name }} </td>
                                                                 <td> {{ $item->email }} </td>
                                                                 <td> {{ $item->phone }} </td>
                                                                 <td> {{ $item->address }} </td>
                                                                 <td> {{ $item->product_title }} </td>
                                                                 <td> <img src="{{ asset('product/' . $item->image) }}" class="img-size" alt=""></td>
                                                                 <td> {{ $item->quantity }}</td>
                                                                 <td> {{ $item->price }} </td>
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
