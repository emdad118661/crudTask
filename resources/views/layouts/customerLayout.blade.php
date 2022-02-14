<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop app</title>
</head>
<body>
    <div id="navbar">
        <a href="{{route('product.all')}}">View All products</a>
        <a href="{{route('customer.cart')}}">View cart</a>
        <a href="{{route('customer.orders')}}">View orders</a>
        <a href="{{route('customer.logout')}}">Logout</a>
    </div>
    <h1>{{$pageName ?? "Customer dashboard"}}</h1>
    <div id="content-section">
        @yield('content')
    </div>
    <div id="footer">
        Developed by <span style="color:green;">18-38760-3</span>
    </div>
</body>
</html>