@extends('layouts.default')

@section('content')
<div class="container mx-auto p-5">

    @if (isset($user))
    <div class="user-info">
        <x-logged-user />
    </div>
    <div class="user-details">
        <h2 class="text-2xl font-bold mb-4">Detalhes do Usuário</h2>
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <div class="user-edit">
        <h3 class="text-xl font-semibold">Editar Usuário</h3>
        <x-validation-error />
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <label for="name" class="block">Nome:</label>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Nome" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <label for="email" class="block">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" placeholder="Email" class="w-full p-2 border border-gray-300 rounded mb-4" required>

            <label for="password" class="block">Senha:</label>
            <input type="password" name="password" placeholder="Nova Senha" class="w-full p-2 border border-gray-300 rounded mb-4">

            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Atualizar Usuário</button>
        </form>
    </div>

    <hr class="my-4">

    <div class="user-delete">
        <h3 class="text-xl font-semibold">Deletar Usuário</h3>
        <form action="{{ route('user.remove', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?');">
            @method('DELETE')
            @csrf
            <button type="submit" class="bg-red-600 text-white rounded px-4 py-2">Deletar Usuário</button>
        </form>
    </div>

    <a href="{{ route('user.index') }}" class="bg-gray-400 text-white rounded px-4 py-2">Voltar</a>
    @else

    <!-- Modal de Add Aluno -->
    <div class="user-create">
        <x-validation-error />
        <button id="open-modal" class="bg-blue-500 text-white rounded px-4 py-2">Criar Usuário</button>
    </div>

    <div class="user-info">
        <x-logged-user />
    </div>
    <x-tables :users="$users" title="Lista de Usuários" />

    <!-- Modal -->
    <div id="user-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-xl mb-4">Novo Usuário</h3>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <label for="name" class="block mb-1">Nome:</label>
                <input type="text" name="name" placeholder="Nome" class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="email" class="block mb-1">Email:</label>
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="password" class="block mb-1">Senha:</label>
                <input type="password" name="password" placeholder="Senha" class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="role" class="block mb-1">Função:</label>
                <input type="text" name="role" placeholder="Função" class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <div class="flex justify-end">
                    <button type="button" id="close-modal" class="mr-2 bg-gray-300 text-black rounded px-4 py-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Criar Usuário</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection

<script>
    // Certifique-se de que o DOM esteja totalmente carregado antes de adicionar os eventos
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('open-modal').addEventListener('click', function() {
            document.getElementById('user-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('user-modal').classList.add('hidden');
        });

        // Removido o código que fechava o modal ao clicar fora dele
    });
</script>