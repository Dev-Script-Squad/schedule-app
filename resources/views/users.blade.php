@extends('master')

@section('content')
    @if (isset($user))
        <h2>Detalhes do Usuário</h2>
        <p>ID: {{ $user->id }}</p>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
    @else
        <h1>Lista de Usuários</h1>
        <ul>
            @foreach ($users as $user)
                <li>ID: {{$user->id}} Nome: {{ $user->name }}, Email: ({{ $user->email }})</li>
            @endforeach
        </ul>
    @endif
@endsection
