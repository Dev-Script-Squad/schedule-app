@extends('layouts.default')

@section('content')
<div class="container mx-auto p-5">

    @if (isset($user))
    <div class="flex justify-between items-center">
        <div class="mb-3">
            <a href="{{ route('user.index') }}" class="bg-gray-400 text-white rounded px-4 py-2">Voltar</a>
        </div>
        <div>
            <x-logged-user />
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8">
        <div class="user-details bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">{{ $user->name }}</h2>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Cargo:</strong> {{ $user->role }}</p>
            <p><strong>Data de Cadastro:</strong> {{ $user->created_at }}</p>
            <p><strong>Ultima Atualização:</strong> {{ $user->updated_at }}</p>
        </div>

        <div class="user-edit bg-gray-100 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Editar Usuário</h3>
            <x-validation-error />
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <label for="name" class="block">Nome:</label>
                <input type="text" name="name" value="{{ $user->name }}" placeholder="Nome"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="email" class="block">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="password" class="block">Senha:</label>
                <input type="password" name="password" placeholder="Nova Senha"
                    class="w-full p-2 border border-gray-300 rounded mb-4">

                <label for="password_confirmation" class="block">Confirme a Senha:</label>
                <input type="password" name="password_confirmation" placeholder="Confirme a Nova Senha"
                    class="w-full p-2 border border-gray-300 rounded mb-4">

                <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Atualizar Usuário</button>
            </form>
        </div>

    </div>

    <hr class="my-4">

    <div class="user-delete">
        <form action="{{ route('user.remove', $user->id) }}" method="POST"
            onsubmit="return confirm('Tem certeza que deseja deletar?');">
            @method('DELETE')
            @csrf
            <button type="submit" class="bg-red-600 text-white rounded px-4 py-2">Deletar Usuário</button>
        </form>
    </div>
    @else
    <div class="flex flex-col justify-center items-center">
        <div class="buttons flex justify-between w-full max-w-[860.8px]">
            <div class="user-create">
                <button id="open-modal" class="bg-blue-500 text-white rounded px-4 py-2">Criar Usuário</button>
            </div>
            <div class="user-info">
                <x-logged-user />
            </div>
        </div>
        <div class="user-table w-full">
            <x-tables :users="$users" title="Lista de Usuários" />
        </div>
    </div>

<!--     @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif

    @if ($errors->any())
    toastr.error("{{ implode(' ', $errors->all()) }}");
    @endif -->


    <div id="user-modal" class="fixed inset-0 z-50 {{ $errors->any() ? '' : 'hidden' }} bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-xl mb-4">Novo Usuário</h3>
            <form id="user-form" action="{{ route('user.store') }}" method="POST">
                @csrf
              


                <label for="name" class="block mb-1">Nome:</label>
                <input id="input" type="text" name="name" value="{{ old('name') }}" placeholder="Nome"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="email" class="block mb-1">Email:</label>
                <input id="input" type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="password" class="block mb-1">Senha:</label>
                <input id="input" type="password" name="password" placeholder="Senha"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="password_confirmation" class="block mb-1">Confirme a Senha:</label>
                <input id="input" type="password" name="password_confirmation" placeholder="Confirme a Senha"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

                <label for="role" class="block mb-1">Função:</label>
                <input id="input" type="text" name="role" value="{{ old('role') }}" placeholder="Função"
                    class="w-full p-2 border border-gray-300 rounded mb-4" required>

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
    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('open-modal').addEventListener('click', function() {
            document.getElementById('user-modal').classList.remove('hidden');
        });


        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('user-modal').classList.add('hidden');
            document.querySelectorAll('input').forEach(input => input.value = '');
        });
    });
</script>