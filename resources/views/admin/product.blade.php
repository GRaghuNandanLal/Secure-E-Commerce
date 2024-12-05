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
        .div_center
        {
            text-align: center;
            padding-top:40px ;

        }
        .h2font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
            padding-bottom: 20px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 20px;
        }
        .text_color
        {
            color: crimson;
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
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}

                </div>
            @endif
            <div class="div_center">
                <h2 class="h2font">Products</h2>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">

                <label>product title</label>
                <input class="input_color" type="text" name="title" placeholder="Write a title"  required="">
                    </div>

                <div class="div_design">

                    <label>product Description</label>
                    <input class="input_color" type="text" name="description" placeholder="Write a Description" required>
                </div>

                <div class="div_design">

                    <label>product Price</label>
                    <input class="input_color" type="number" name="price" placeholder="Write the Price" required="">
                </div>

                <div class="div_design">

                    <label>Discount Price</label>
                    <input class="input_color" type="text" name="discount_price" placeholder="Write a title">
                </div>


                <div class="div_design">

                    <label>product Quantity</label>
                    <input class="input_color" type="number" name="quantity" min="0" placeholder="Whats the quantity"required="">
                </div>

                <div class="div_design" >

                    <label>product Catagory</label>
                    <select class="text_color" name="catagory">
                        <option value="" selected="">Add catagory here</option>
                        @foreach($category as $catagory)
                            <option value="{{$catagory -> catagory_name}}">{{$catagory -> category_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="div_design">

                    <label>Product Image Here</label>
                    <input type="file" name="image"required="">


              </div>

                    <div class="div_design">

                        <label>Audio</label>
                        <input type="file" name="play">

                    </div>


                <div class="div_design" style="margin-bottom: 50px">

                    <input type="submit" value="Add Product" class="btn btn-primary">


                </div>
                </form>



            </div>
        </div>
    </div>
    <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')<!-- End custom js for this page -->
</body>
</html>
