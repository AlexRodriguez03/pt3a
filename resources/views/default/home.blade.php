@extends('layout')
@section('title', 'Home')

@section('stylesheets')
    @parent
@endsection

@section('content')
    <div>
      <img src="{{ asset ('img/logo.png') }}" alt="" width=100>
      <h2>UF2-Pt2e</h2>
      <hr>
      <h3>Pràctica per iniciar-se en els conceptes bàsics de Laravel</h3>
      @if (Cookie::has('autor')) 
        <a href="{{ route('esborrarCookie') }}">Esborrar cookies</a>
      @endif
    </div>
@endsection