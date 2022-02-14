@extends('layouts.productLayout')
@section('content')

    @foreach($product_info as $product)
        <form action="" method="post">
        {{@csrf_field()}}
            <table>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="product_id" value="{{encrypt($product['product_id'])}}"></td>
                </tr>
                <tr>
                    <td>Product name:</td>
                    <td><input type="text" name="product_name" id="" value="{{$product['product_name']}}" disabled></td>
                </tr>
                <tr>
                    <td>Product price:</td>
                    <td><input type="number" name="product_price" id="" value="{{$product['product_price']}}" disabled></td>
                </tr>
                <tr>
                    <td>Product description:</td>
                    <td><textarea name="product_description" id="" cols="21" rows="10" disabled>{{$product['product_description']}}</textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add to cart"></td>
                </tr>
            </table>
        </form>
    @endforeach
@endsection
