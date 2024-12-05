<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA-TV</title>
    @include('home.css')
    <style>
        .div2{
            padding-top: 50px;
        }
    </style>



</head>
<body>
@include('sweetalert::alert')
@include('home.header')


<!-- services section start -->
<section class="services" id="services">
    <div class="max-width">
        <h4 style="color: black" class="title">MPESA STANDARD FORM</h4>
        <div class="serv-content">
            <h1 style="font-size: 1.4rem">Make sure to click the button below to make sure your order is placed succesfully </h1>
            <a class="btn btn-success" href="{{ url('cash_order') }}">Click to Finish purchase and Place order</a>
        </div>
    </div>
</section>
@include('home.footer')
<!-- script-->
@include('home.script')

</body>
</html>
<script>
    import Buttons from "../../../public/admin/pages/ui-features/buttons.html";
    export default {
        components: {Buttons}
    }
</script>
