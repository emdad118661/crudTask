@extends('layouts.productLayout')
@section('content')
    <form action="" method="post">
        {{@csrf_field()}}
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="prodName" value="{{old('prodName')}}" id="prodName"></td>
                <td><span style="color:red;">
                    @error('prodName')
                        {{$message}}
                    @enderror
                </span></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="number" name="prodPrice" value="{{old('prodPrice')}}" id="prodPrice"></td>
                <td><span style="color:red;">
                    @error('prodPrice')
                        {{$message}}
                    @enderror
                </span></td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td><input type="number" name="prodQty" value="{{old('prodQty')}}" id="prodQty"></td>
                <td><span style="color:red;">
                    @error('prodQty')
                        {{$message}}
                    @enderror
                </span></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="prodDesc" id="prodDesc" value="{{old('prodDesc')}}" cols="21" rows="10"></textarea></td>
                <td><span style="color:red;">
                    @error('prodDesc')
                        {{$message}}
                    @enderror
                </span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add product"></td>
            </tr>
        </table>
    </form>
@endsection