<!DOCTYPE html>
<html lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Invoice #6</title>

     <style>
          html,
          body {
               margin: 10px;
               padding: 10px;
               font-family: sans-serif;
          }

          h1,
          h2,
          h3,
          h4,
          h5,
          h6,
          p,
          span,
          label {
               font-family: sans-serif;
          }

          table {
               width: 100%;
               border-collapse: collapse;
               margin-bottom: 0px !important;
          }

          table thead th {
               height: 28px;
               text-align: left;
               font-size: 16px;
               font-family: sans-serif;
          }

          table,
          th,
          td {
               border: 1px solid #ddd;
               padding: 8px;
               font-size: 14px;
          }

          .heading {
               font-size: 24px;
               margin-top: 12px;
               margin-bottom: 12px;
               font-family: sans-serif;
          }

          .small-heading {
               font-size: 18px;
               font-family: sans-serif;
          }

          .total-heading {
               font-size: 18px;
               font-weight: 700;
               font-family: sans-serif;
          }

          .order-details tbody tr td:nth-child(1) {
               width: 20%;
          }

          .order-details tbody tr td:nth-child(3) {
               width: 20%;
          }

          .text-start {
               text-align: left;
          }

          .text-end {
               text-align: right;
          }

          .text-center {
               text-align: center;
          }

          .company-data span {
               margin-bottom: 4px;
               display: inline-block;
               font-family: sans-serif;
               font-size: 14px;
               font-weight: 400;
          }

          .no-border {
               border: 1px solid #fff !important;
          }

          .bg-blue {
               background-color: #414ab1;
               color: #fff;
          }
     </style>
</head>

<body>

     <table class="order-details">
          <thead>
               <tr>
                    <th width="50%" colspan="2">
                         <h2 class="text-start">Nama Bisnis</h2>
                    </th>
                    <th width="50%" colspan="2" class="text-end company-data">
                         <span>Invoice Id: #{{ $order_list->id }}</span> <br>
                         <span>Date: {{ $order_list->created_at }}</span> <br>
                         <span>Address: {{ $order_list->address }}</span> <br>
                    </th>
               </tr>
               <tr class="bg-blue">
                    <th width="50%" colspan="2">Order Details</th>
                    <th width="50%" colspan="2">User Details</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>Order ID:</td>
                    <td>#{{ $order_list->id }}</td>

                    <td>Full Name:</td>
                    <td>{{ $order_list->name }}</td>
                    {{-- <td>User ID:</td>
                    <td>{{ $order_list->user_id }}</td> --}}
               </tr>
               {{-- <tr>
                    <td>Product Id:</td>
                    <td>{{ $order_list->id }}</td>


               </tr> --}}
               <tr>
                    <td>Ordered Date:</td>
                    <td>{{ $order_list->created_at }}</td>

                    <td>Email Id:</td>
                    <td>{{ $order_list->email }}</td>
               </tr>
               <tr>
                    <td>Payment Status:</td>
                    <td>{{ $order_list->payment_status }}</td>

                    <td>Phone:</td>
                    <td>{{ $order_list->phone }}</td>
               </tr>
               <tr>
                    <td>Delivery Status:</td>
                    <td>{{ $order_list->delivery_status }}</td>

                    <td>Address:</td>
                    <td>{{ $order_list->address }}</td>
               </tr>
          </tbody>
     </table>

     <table>
          <thead>
               <tr>
                    <th class="no-border text-start heading" colspan="5">
                         Order Items
                    </th>
               </tr>
               <tr class="bg-blue">
                    <th>ID</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th colspan="2">Quantity</th>
                    <th>Total</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($order as $item)
                    <tr>
                         <td> {{ $item->product_id }} </td>
                         <td>
                              {{ $item->product_title }}
                         </td>
                         <td>{{ $item->size }}</td>
                         <td colspan="2"> {{ $item->quantity }} </td>
                         <td class="fw-bold"> {{ $item->price }} </td>
                    </tr>
               @endforeach

               <tr>
                    <td colspan="5" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                    <td colspan="1" class="total-heading">
                         {{ $order_list->total_price }}
                    </td>
               </tr>
          </tbody>
     </table>

     <br>
     <p class="text-center">
          Thank your for shopping with US!
     </p>

</body>

</html>
