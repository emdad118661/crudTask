@extends('layouts.productLayout')
@section('content')

    <span id="error" style="color:red;">{{$loginError ?? ''}}</span>
    <form action="" method="post">
        {{@csrf_field()}}
        Customer contact:
        <input type="number" name="c_contact" id="" value="{{old('c_contact')}}">
        <input type="submit" value="Login">
        <span style="color:red;">
            @error('c_contact')
                {{$message}}
            @enderror
        </span>
    </form>

@endsection
