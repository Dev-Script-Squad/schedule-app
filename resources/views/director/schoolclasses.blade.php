@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-6 min-h-screen">
        @if (isset($schoolclass))
            <div class="schoolclass-info mb-4">
                <x-logged-user />
            </div>
            <div class="schoolclass-details mb-4">
                <h2 class="text-2xl font-bold mb-2">Detalhes da Turma</h2>
                <p class="text-gray-700"><strong>ID:</strong> {{ $schoolclass->id }}</p>
                <p class="text-gray-700"><strong>Nome:</strong> {{ $schoolclass->name }}</p>
            </div>

            <hr class="my-4">

            <div class="schoolclass-students mb-4">
                <h2 class="text-2xl font-bold mb-2">Alunos da turma</h2>
                @foreach ($students as $student)
                    <p class="text-gray-700"><strong>ID:</strong> {{ $student->id }}</p>
                    <p class="text-gray-700"><strong>Nome:</strong> {{ $student->name }}</p>
                @endforeach
            </div>

            <hr class="my-4">
            <div class="flex justify-between mb-4">
                <a href="{{ route('schoolclass.index') }}"
                    class="inline-block mt-4 bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">
                    Voltar
                </a>
                <div class="schoolclass-delete">
                    <form action="{{ route('schoolclass.remove', $schoolclass->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja deletar?');">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700 transition">
                            Deletar turma
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="bg-white/80 shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4">Criar Nova Turma</h2>
                <form action="{{ route('schoolclass.store') }}" method="POST" class="">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome da Turma:</label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Digite o nome da turma" required>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Criar Turma
                    </button>
                </form>
            </div>
            {{-- <div class="user-info mb-4">
                    <x-logged-user />
                </div> --}}
            <x-tables :schoolclasses="$schoolclasses" title="Turmas" />
        @endif
    </div>
@endsection
