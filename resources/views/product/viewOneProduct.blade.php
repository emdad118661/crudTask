@extends('layouts.productLayout')
@section('content')
    <!-- {{$prod}} -->
        <form action="" method="post">
            {{@csrf_field()}}
            <table>
                <tr>
                    <td><b>Product name:</b></td>
                    <td><input type="text" name="prodName" id="" value="{{$prod->product_name}}"></a></td>
                </tr>
                <tr>
                    <td><b>Product price:</b></td>
                    <td><input type="number" name="prodPrice" id="" value="{{$prod->product_price}}"></td>
                </tr>
                <tr>
                    <td><b>Product quantity:</b></td>
                    <td><input type="number" name="prodQty" id="" value="{{$prod->product_quantity}}"></td>
                </tr>
                <tr>
                    <td><b>Product description:</b></td>
                    <td><textarea name="prodDesc" id="" cols="21" rows="10">{{$prod->product_description}}</textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update">
                        <input type="submit" name="submit" value="Delete">
                    </td>
                </tr>
            </table>
        </form>
@endsection