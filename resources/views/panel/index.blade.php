@extends("layouts.master")

@section('content')
    <h2>User Panel</h2>
    {{ auth()->user()->name }}
    <a href="/auth/logout">logout</a>
@endsection