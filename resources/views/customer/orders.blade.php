@extends('layouts.customerLayout')
@section('content')
    <table>
        <tr>
            <th>Product name</th>
            <th>Product price</th>
        </tr>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{$orderDetail[0]['product_name']}}</td>
                <td>{{$orderDetail[0]['product_price']}}</td>
            </tr>
        @endforeach
    </table>
@endsection
