@extends('layouts.master')

@section('content')
    <form action="/auth/register" method="post">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" value = "{{ $old('name') }}">
            @if($errors->has('name'))
            <span>{{$errors->first('name')}}</span>
            @endif
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" value = "{{ $old('email') }}">
            @if($errors->has('email'))
                <span>{{$errors->first('email')}}</span>
            @endif
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password" value = "{{ $old('password') }}">
            @if($errors->has('password'))
                <span>{{$errors->first('password')}}</span>
            @endif
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="password" name="confirm_password" value = "{{ $old('confirm_password') }}">
            @if($errors->has('confirm_password'))
                <span>{{$errors->first('confirm_password')}}</span>
            @endif
        </div>
        <button type="submit">Register</button>
    </form>

@endsection
