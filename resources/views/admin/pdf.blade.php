<!DOCTYPE html>
<html>
<head>
    <title>
        yellow
    </title>
    <style>
        .h1
        {
            margin: auto;
            padding: 30px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
        .h-deg
        {
            padding: 30px;
        }
    </style>
</head>
<body>
<div>
    <h1 class="h1">Reciept</h1>

    <h2>
        Customer Name:
        {{$order->name}}
    </h2>
    <h2>

    <h2 class="h-deg">
        Product:
        {{$order->product_title}}
    </h2>
        Price:
        {{$order->price}}
    </h2>
    <h2>
        Payment Method:
        {{$order->payment_status}}
    </h2>
</div>
</body>
</html>
