@extends('layouts.productLayout')
@section('content')
    @foreach($allProducts as $product)
        <table>
            <tr>
                <td><b>Product name:</b></td>
                <td><a href="{{route('product.id', ['id'=>encrypt($product->product_id)])}}">{{$product->product_name}}</a></td>
            </tr>
            <tr>
                <td><b>Product price:</b></td>
                <td>{{$product->product_price}}</td>
            </tr>
            <tr>
                <td><b>Product quantity:</b></td>
                <td>{{$product->product_quantity}}</td>
            </tr>
            <tr>
                <td><b>Product description:</b></td>
                <td>{{$product->product_description}}</td>
            </tr>
        </table>
        <br>
    @endforeach
@endsection