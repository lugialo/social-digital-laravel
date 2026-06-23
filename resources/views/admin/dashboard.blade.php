@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h2>Painel Administrativo</h2>
<p>Bem-vindo, {{ Auth::user()->name }}!</p>
@endsection
