<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tonny Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <style>
        label
        {
            display: inline-block;
            width: 250px;
            font-width: bold;
            font-size: 18px;
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
            <h1 style="text-align: center;font-size: 1.3rem">Send email to :  {{$order->email}}</h1>
            <form action="{{url('send_user_email',$order->id)}}" method="POST">
                @csrf

            <div style="padding-left: 35% ; padding-top: 30px">
                <label>Email Greeting</label>
                <input style="color: black" type="text" name="greeting"  >
            </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <label>Email Firstline</label>
                    <input  style="color: black" type="text" name="firstline"  >
                </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <label>Email Body</label>
                    <input  style="color: black" type="text" name="body"  >
                </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <label>Email button name</label>
                    <input style="color: black" type="text" name="button"  >
                </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <label>Email url</label>
                    <input style="color: black" type="text" name="url"  >
                </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <label>Email last line</label>
                    <input  style="color: black" type="text" name="lastline"  >
                </div>

                <div style="padding-left: 35% ; padding-top: 30px">
                    <input  type="submit"  value="Send Email" class="btn btn-primary" >
                </div>

            </form>
        </div>
    </div>
    <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')<!-- End custom js for this page -->
</body>
</html>
