@props(['users' => [], 'title', 'schoolclasses' => []])

<div class="main-content p-5 transition-margin duration-300 ease-in-out flex justify-center">
    <div class="bg-white/80 p-6 rounded-xl shadow-lg w-full max-w-4xl h-auto overflow-auto">
        <div class="mb-4">
            <p class="font-bold text-3xl text-center">{{ $title }}</p>
        </div>

        @if (!empty($users))
            <div class="grid grid-cols-1 gap-6 mt-6">
                @foreach ($users as $user)
                    <a href="{{ route('user.show', $user->id) }}"
                        class="bg-white rounded-lg shadow-md p-5 flex justify-between items-center hover:bg-gray-100 transition duration-300">
                        <div class="flex items-center w-full">
                            <img src="{{ asset('images/kaio.jpg') }}" alt="Foto do Usuário"
                                class="w-12 h-12 rounded-full mr-4">
                            <div class="flex items-center w-full">
                                <p class="font-semibold text-lg w-1/3 truncate">{{ $user->name }}</p>
                                <p class="text-gray-700 text-center w-2/3">{{ $user->email }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        @if (!empty($schoolclasses))
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
                @foreach ($schoolclasses as $schoolclass)
                    <a href="{{ route('schoolclass.show', $schoolclass->id) }}"
                        class="flex justify-center items-center bg-white rounded-lg shadow-md p-5 hover:bg-gray-100 transition duration-300 block">
                        <p class="text-gray-700 mb-2">{{ $schoolclass->name }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
