@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-6 min-h-screen">
        @if (isset($schoolclass))
            <div class="schoolclass-info flex justify-between mb-4">
                <a href="{{ route('schoolclass.index') }}"
                    class="inline-block mt-4 bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition">
                    Voltar
                </a>
                <x-logged-user />
            </div>

            <div class="schoolclass-details mb-6 bg-white shadow-lg rounded-lg p-6 border border-gray-200">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-4">
                    <i class="fas fa-school mr-2 text-blue-500"></i> Detalhes da Turma
                </h2>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <p class="text-lg font-medium text-gray-700">
                            <strong>ID:</strong>
                            <span class="text-gray-600">{{ $schoolclass->id }}</span>
                        </p>
                        <p class="text-lg font-medium text-gray-700">
                            <strong>Classe:</strong>
                            <span class="text-gray-600">{{ $schoolclass->name }}</span>
                        </p>
                        <p class="text-lg font-medium text-gray-700">
                            <strong>Quantidade de alunos:</strong>
                            <span class="text-gray-600">{{ $studentCount }}</span>
                        </p>
                        <p class="text-lg font-medium text-gray-700">
                            <strong>Quantidade de professores:</strong>
                            <span class="text-gray-600">{{ $teacherCount }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="flex justify-between space-x-6">
                <div class="schoolclass-students w-1/2 bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-2">Alunos da turma</h2>
                    @if ($students->isEmpty())
                        <p class="text-gray-700">Nenhum aluno cadastrado.</p>
                    @else
                        @foreach ($students as $student)
                            <div class="border rounded-lg mb-2 p-3 bg-gray-100 cursor-pointer hover:bg-gray-200 transition"
                                onclick="toggleDetails('student-{{ $student->id }}')">
                                <div class="flex">
                                    <p class="text-gray-700">
                                        <img class="w-6 h-6 mr-3" alt="Ícone de Alunos"
                                            src="{{ asset('images/diplomadosvg.svg') }}">
                                    </p>
                                    {{-- <p class="text-gray-700"><strong>ID:</strong> {{ $student->id }}</p> --}}
                                    <p class="text-gray-700"> {{ $student->user->name }}</p>
                                </div>
                                <div id="student-{{ $student->id }}" class="hidden">
                                    <p class="text-gray-700"><strong>Email:</strong> {{ $student->user->email }}</p>
                                    <p class="text-gray-700"><strong>Responsável:</strong>
                                        {{ $student->guardianUser->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="schoolclass-teachers w-1/2 bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-2xl font-bold mb-2">Professores da turma</h2>
                    @if ($teachers->isEmpty())
                        <p class="text-gray-700">Nenhum professor cadastrado.</p>
                    @else
                        @foreach ($teachers as $teacher)
                            <div class="border rounded-lg mb-2 p-3 bg-gray-100 cursor-pointer hover:bg-gray-200 transition"
                                onclick="toggleDetails('teacher-{{ $teacher->id }}')">
                                <div class="flex">
                                    {{-- <p class="text-gray-700"><strong>ID:</strong> {{ $teacher->id }}</p> --}}
                                    <p class="text-gray-700">
                                        <img class="w-6 h-6 mr-3" alt="Ícone de Alunos"
                                            src="{{ asset('images/teacher.svg') }}">
                                    </p>
                                    <p class="text-gray-700">{{ $teacher->user->name }}</p>
                                </div>
                                <div id="teacher-{{ $teacher->id }}" class="hidden">
                                    <p class="text-gray-700"><strong>Email:</strong> {{ $teacher->user->email }}</p>
                                    <p class="text-gray-700"><strong>Especialidade:</strong> {{ $teacher->specialty }}</p>
                                    <p class="text-gray-700"><strong>Título:</strong> {{ $teacher->educational_degree }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr class="my-4">

            <div class="flex justify-between">
                <div class="add-students">
                    <x-add-students-in-schoolclasses :schoolclass="$schoolclass" :availableStudents="$availableStudents" />
                </div>
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
            <x-tables :schoolclasses="$schoolclasses" title="Turmas" />
        @endif
    </div>
    <script>
        function toggleDetails(id) {
            const element = document.getElementById(id);
            element.classList.toggle('hidden');
        }
    </script>
@endsection
