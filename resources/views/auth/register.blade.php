@extends('layouts.header')

@section('title','Register')

@section('content')

    <form action="{{ route('auth.create') }}" method="POST">
        
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" />
            @error('name')
                {{ $message }}
            @enderror
        <label for="">Email</label>
        <input type="email" name="email" id="w" />
            @error('email')
                {{ $message }}
            @enderror

        <label for="">Username</label>
        <input type="text" name="username" />
            @error('username')
                {{ $message}}
            @enderror
        <label for="">Password</label>
        <input type="password" name="password">
            @error('password')
                {{ $message }}
            @enderror
        <label for="">Confirmar password</label>
        <input type="password" name="password_confirmation">
            @error('password_confirmation')
                {{ $message }}
            @enderror
        <input type="submit" value="Register">
    </form>
@endsection
