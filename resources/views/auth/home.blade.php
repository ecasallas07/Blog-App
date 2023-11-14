@extends('layouts.header')

@section('title','Home')

@section('content')
    
    @auth
        <h1>Bienvenido al blog correctamente</h1>
    @endauth

    @guest
        <h2>Registrate por favor si quieres</h2>
    @endguest
@endsection