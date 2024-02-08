@extends('layouts.master')

@section('content')
    <form action="/auth/register" method="post">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="text" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirm Password: </label>
            <input type="text" name="confirm_password">
        </div>
        <button type="submit">Register</button>
    </form>

@endsection
