<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tonny Admin</title>
    <base href="/public">
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
@include('sweetalert::alert')
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
                <h2 class="h2font">Update products</h2>
                <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="div_design">

                        <label>product title</label>
                        <input class="input_color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">
                    </div>

                    <div class="div_design">

                        <label>product Description</label>
                        <input class="input_color" type="text" name="description" placeholder="Write a Description" required="" value="{{$product->description}}">
                    </div>

                    <div class="div_design">

                        <label>product Price</label>
                        <input class="input_color" type="number" name="price" placeholder="Write the Price" required="" value="{{$product->price}}">
                    </div>

                    <div class="div_design">

                        <label>Discount Price</label>
                        <input class="input_color" type="text" name="discount_price" placeholder="Write a title" value="{{$product->discount_price}}">
                    </div>


                    <div class="div_design">

                        <label>product Quantity</label>
                        <input class="input_color" type="number" name="quantity" min="0" placeholder="Whats the quantity"required="" value="{{$product->quantity}}">
                    </div>

                    <div class="div_design" >

                        <label>product Catagory</label>
                        <select class="text_color" name="catagory" style="color: black">
                            <option value="{{$product->catagory}}" selected="" style="color: black">{{$product->catagory}}</option>
                            @foreach($catagory as $catagory)
                                <option value="{{$catagory -> catagory_name}}">{{$catagory -> category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">

                        <label> Current Product Image</label>
                        <img  style="margin: auto" height="100px" width="100px" src="/product/{{$product->image}}">


                    </div>


                    <div class="div_design">

                        <label style="font-size: 1.2rem"> Change Product Image Here</label>
                        <input type="file" name="image"required="">


                    </div>


                    <div class="div_design" style="margin-bottom: 50px">

                        <input type="submit" value="Update Product" class="btn btn-primary">


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
