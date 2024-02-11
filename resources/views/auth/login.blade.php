@extends('layouts.master')

@section('content')
    <form action="/auth/login" method="post">
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
        <button type="submit">Login</button>
    </form>

@endsection
