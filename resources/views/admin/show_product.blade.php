<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tonny Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style type="text/css">
        .center
        {
            margin: auto;
            width: 100%;
            border: 2px solid green;
            text-align: center;
            margin-top: 40px;

        }
        .centered
        {
            text-align: center;
            margin: auto;
            font-size: 2.3rem;

        }
        .img
        {
            width: 100px;
            height: 100px;
        }
        .th_color
        {
            background-color: limegreen;
        }
        .th
        {
            padding: 12px;
        }
    </style>
</head>
<body>
@include('sweetalert::alert')
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
            <div>
                <h2 class="centered">
                    All Products
                </h2>
            </div>
            <table class="center">
                <tr class="th_color">
                    <th class="th">Product Title</th>
                    <th class="th">Product Description</th>
                    <th class="th">image</th>
                    <th class="th">Catagory</th>
                    <th class="th">Quantity</th>
                    <th class="th">Price</th>
                    <th class="th">Discount Price</th>
                    <th class="th">Delete</th>
                    <th class="th">Edit</th>
                </tr>
                @foreach($product as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td><img class="img" src="/product/{{$product->image}}"></td>
                    <td>{{$product->catagory}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <a  class="btn btn-danger" onclick="return confirm('Are you sure you wan to delete the product')" href="{{url('delete_product', $product-> id)}}">DELETE</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product', $product-> id)}}">EDIT</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')<!-- End custom js for this page -->
</body>
</html>
