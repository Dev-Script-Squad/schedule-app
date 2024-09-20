@extends('master')

@section('content')
    <h2>Bem vindo</h2>

    <form action="{{ route('user.login') }}" method="post">
        @csrf
        <input type="email" name="email" class="text" placeholder="Email">
        <input type="password" name="password" class="text" placeholder="Senha">
        <button class="submit">Entrar</button>
    </form>
    <a href="esqueciasenha.com">Esqueci a senha</a>
    {{-- <Login /> --}}
@endsection
