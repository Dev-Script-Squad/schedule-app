@extends('master')

@section('content')
    @if (isset($user))
        {{-- Logout será um component --}}
        <h2>Usuário logado: {{ auth()->user()->name }} </h2>
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button class="logout">Sair</button>
        </form>
        <h2>Detalhes do Usuário</h2>
        <p>ID: {{ $user->id }}</p>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Senha: {{ $user->password }}</p>

        <hr>

        <h3>Editar Usuário</h3>
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <label for="name">Nome:</label><br>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Nome"><br>

            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"><br>

            <label for="password">Senha:</label><br>
            <input type="password" name="password" placeholder="Nova Senha"><br>

            <button type="submit">Atualizar Usuário</button>
        </form>

        <hr>

        <h3>Deletar Usuário</h3>
        <form action="{{ route('user.remove', $user->id) }}" method="POST"
            onsubmit="return confirm('Tem certeza que deseja deletar?');">
            @method('DELETE')
            @csrf
            <button type="submit" class="delete">Deletar Usuário</button>
        </form>

        <a href="{{ route('user.index') }}" class="return">Voltar</a>
    @else
        {{-- Logout será um component --}}
        <h2>Usuário logado: {{ auth()->user()->name }} </h2>
        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button class="logout">Sair</button>
        </form>
        <h1>Lista de Usuários</h1>
        <ul>
            @foreach ($users as $user)
                <li>ID: {{ $user->id }} Nome: {{ $user->name }}, Email: ({{ $user->email }}), <a
                        href="{{ route('user.show', $user->id) }}">Ver Detalhes</a></li>
            @endforeach
        </ul>

        <hr>

        <h3>Criar Novo Usuário</h3>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Nome"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email"><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" placeholder="Senha"><br>

            <label for="role">Função:</label>
            <input type="role" name="role" placeholder="Função"><br>

            <button type="submit">Criar Usuário</button>
        </form>
    @endif
@endsection
