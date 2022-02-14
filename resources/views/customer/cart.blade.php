@extends('layouts.customerLayout')
@section('content')
    @foreach($cartItems as $item)
        @php 
            $cartItem = json_decode($item)
        @endphp

        <form action="" method="post">
        {{@csrf_field()}}
            <table>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="product_id" value="{{encrypt($cartItem->product_id)}}"></td>
                </tr>
                <tr>
                    <td>Product name:</td>
                    <td><input type="text" name="product_name" id="" value="{{$cartItem->product_name}}" disabled></td>
                </tr>
                <tr>
                    <td>Product price:</td>
                    <td><input type="number" name="product_price" id="" value="{{$cartItem->product_price}}" disabled></td>
                </tr>
                <tr>
                    <td>Product description:</td>
                    <td><textarea name="product_description" id="" cols="21" rows="10" disabled>{{$cartItem->product_description}}</textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Order"></td>
                </tr>
            </table>
        </form>
        <br><br>
    @endforeach
@endsection