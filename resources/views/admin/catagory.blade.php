<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> TONNY ADMIN</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style>
        .div_center
        {
            text-align: center;
            padding-top:40px ;

        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
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
            <div class="div_center">
                <h2 class="h2_font">Add Catagory</h2>
                <form  action="{{url('/add_catagory')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="catagory" placeholder="Write Catagory Name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory" >
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>Catagory Name</td>
                    <td>Action</td>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->catagory_name}}</td>
                    <td><a onclick="return confirm('Are you sure you want to delete this')" class="btn btn-danger" href="{{url('delete_catagory', $data-> id)}}">Delete</a></td>
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
