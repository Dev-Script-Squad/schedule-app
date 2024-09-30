@extends('layouts.default')

@section('content')
    <div class="container">
        @if (isset($user))
            <div class="user-info">
                <x-logged-user />
            </div>
            <div class="user-details">
                <h2>Detalhes do Usuário</h2>
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>

            <hr>

            <div class="user-edit">
                <h3>Editar Usuário</h3>
                <x-validation-error />
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <label for="name">Nome:</label>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="Nome"><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"><br>

                    <label for="password">Senha:</label>
                    <input type="password" name="password" placeholder="Nova Senha"><br>

                    <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                </form>
            </div>

            <hr>

            <div class="user-delete">
                <h3>Deletar Usuário</h3>
                <form action="{{ route('user.remove', $user->id) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja deletar?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Deletar Usuário</button>
                </form>
            </div>

            <a href="{{ route('user.index') }}" class="btn btn-secondary">Voltar</a>
        @else
            <div class="user-info">
                <x-logged-user />
            </div>
            <x-tables :users="$users" title="Lista de Usuários"/>

            <hr>

            <div class="user-create">
                <h3>Criar Novo Usuário</h3>
                <x-validation-error />
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

                    <button type="submit" class="btn btn-primary">Criar Usuário</button>
                </form>
            </div>
        @endif
    </div>
@endsection

<style scoped>
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
    }

    h2,
    h3 {
        margin-bottom: 20px;
    }

    ul.error-list {
        color: red;
        list-style-type: none;
        padding: 0;
    }

    .user-info,
    .user-details,
    .user-edit,
    .user-delete,
    .user-create {
        margin-bottom: 40px;
    }

    button.logout,
    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    button.logout {
        background-color: #e74c3c;
        color: white;
    }

    button.btn.btn-primary {
        background-color: #3498db;
        color: white;
    }

    button.btn.btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    button.btn.btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .user-list li {
        margin-bottom: 10px;
    }
</style>
