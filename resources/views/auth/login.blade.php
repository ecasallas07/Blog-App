@extends('layouts.header')

@section('title','Login')

@section('content')
    <form action="{{ route('auth.authenticate') }}" method="POST">
        @csrf
        <label for="">Username/Email</label>
        <input type="text" name="username" id="" />

        <label for="">Password</label>
        <input type="password" name="password" id="" />

        <input type="submit" value="Iniciar session">
    </form>

@endsection
