<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tonny Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style>
        .h1
        {
            text-align: center;
            margin: auto;
            padding: 30px;
        }
        .table
        {
            border: 2px solid limegreen;
            width: 100%;
            margin: auto;
            padding-top: 30px;
            text-align: center; class="th"
        }
        .th
        {
            background-color: limegreen;
        }
        .img
        {
            width: 200px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="h1">All Orders</h1>
            <div style="margin: auto; padding-bottom:30px ;padding-left: 650px;color: black">
                <form action="{{url('search')}}" method="get">
                    <input type="text" name="search" placeholder="Seach order">

                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>
            <table class="table">
                <tr>
                    <th class="th">Name</th>
                    <th class="th">Email</th>
                    <th class="th">Address</th>
                    <th class="th">Phone</th>
                    <th class="th">Product title</th>
                    <th class="th">Quantity</th>
                    <th class="th">Price</th>
                    <th class="th">Payment Status</th>
                    <th class="th">Delivery status</th>
                    <th class="th">Image</th>
                    <th class="th">Delivered</th>
                    <th class="th">Print PDF</th>
                    <th class="th">Send Email</th>





                </tr>
                @forelse($order as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img class="img" src="/product/{{$order->image}}"></td>
                    <td>
                        @if($order->delivery_status=='processing')
                        <a class="btn btn-success" href="{{url('delivered',$order->id)}}" onclick="return confirm('Is the product already confirmed for delivery?')">Deliver</a>
                    </td>


                    @else
                        <p style="color: green">Delivered</p>
                    @endif

                    <td>
                        <a class="btn btn-success" href="{{url('print',$order->id)}}">Print </a>
                    </td>

                    <td>
                        <a class="btn btn-info" href="{{url('send_email', $order->id)}}">Email buyer</a>
                    </td>

                </tr>

                    @empty
                    <tr>
                        <td class="td" style="padding-left: 650px">No data found</td>
                    </tr>


                @endforelse


            </table>



        </div>
    </div>
    <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')<!-- End custom js for this page -->
</body>
</html>
