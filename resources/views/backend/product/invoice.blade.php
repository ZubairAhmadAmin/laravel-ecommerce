<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h3> Customer Name : {{$order->name}} </h3>
        <h3> Customer Address : {{$order->address}} </h3>
        <h3> Customer Phone : {{$order->phone}} </h3>
        <hr>
        <img src="product/{{$order->product->image}}" alt="">
        <h4>Product Title : {{$order->product->title}}</h4>
        <h4>Product Price : {{$order->product->price}}</h4>
    </center>
</body>
</html>