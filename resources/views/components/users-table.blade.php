@props(['users', 'title'])

<div class="main-content p-5 transition-margin duration-300 ease-in-out flex justify-center">
    <div class="bg-white/80 p-6 rounded-xl shadow-lg w-full max-w-4xl h-auto overflow-auto">
        <div class="mb-4">
            <p class="font-bold text-3xl text-center">{{ $title }}</p> <!-- Título dinâmico -->
        </div>
        @if ($users->isEmpty())
            <p class="text-center text-gray-700">Não há usuários cadastrados.</p>
        @else
            <div class="table-responsive">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-200 sticky top-0">
                        <tr>
                            <th class="p-4 text-left">ID</th>
                            <th class="p-4 text-left">Nome</th>
                            <th class="p-4 text-left">Email</th>
                            <th class="p-4 text-left">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="p-4">{{ $user->id }}</td>
                                <td class="p-4">{{ $user->name }}</td>
                                <td class="p-4">{{ $user->email }}</td>
                                <td class="p-4">
                                    <a class="text-blue-500 hover:underline"
                                        href="{{ route('user.show', $user->id) }}">Ver Detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
