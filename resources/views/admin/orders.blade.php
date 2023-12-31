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
                                        <h4 class="card-title">Data Orders</h4>
                                        <div class="table-responsive">
                                             <table class="table">
                                                  <thead>
                                                       <tr>
                                                            <th>Order ID</th>
                                                            <th> Cust. Name </th>
                                                            <th> Total Price </th>
                                                            <th> Payment Status </th>
                                                            <th> Delivery Status </th>
                                                            <th> Action </th>
                                                            <th> Print PDF </th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($order as $order)
                                                            <tr>
                                                                 <td> {{ $order->id }} </td>
                                                                 <td> {{ $order->name }} </td>
                                                                 <td> {{ $order->total_price }} </td>
                                                                 <form action="{{ url('/update_status_orders', $order->id) }}" method="POST" enctype="multipart/form-data">
                                                                      @csrf
                                                                      <td>
                                                                           <select class="custom-select" name="payment_status" id="" required>
                                                                                <option value="{{ $order->payment_status }}" selected>{{ $order->payment_status }}</option>
                                                                                <option value="Confirmation to Admin"> Confirmation to Admin </option>
                                                                                <option value="Lunas"> Lunas </option>
                                                                           </select>
                                                                      </td>
                                                                      <td>
                                                                           <select class="custom-select" name="delivery_status" id="" required>
                                                                                <option value="{{ $order->delivery_status }}" selected>{{ $order->delivery_status }}</option>
                                                                                <option value="Processing"> Processing </option>
                                                                                <option value="Pengiriman Kurir"> Pengiriman Kurir </option>
                                                                                <option value="Terkirim"> Terkirim </option>
                                                                           </select>
                                                                      </td>
                                                                      <td>
                                                                           <a href="{{ url('/orders_detail/' . $order->id) }}" class="btn btn-warning">Detail</a>
                                                                           <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                                      </td>
                                                                 </form>
                                                                 <td>
                                                                      <a class="btn btn-danger" href="{{ url('print_pdf', $order->id) }}"> Print PDF </a>
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
