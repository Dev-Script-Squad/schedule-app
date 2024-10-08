@props(['users' => [], 'title', 'schoolclasses' => []])

<div class="main-content p-6 transition-all duration-300 ease-in-out flex justify-center">
    <div class="bg-white/90 p-8 rounded-2xl shadow-2xl w-full max-w-5xl h-auto overflow-hidden">
        <div class="mb-6 text-center">
            <p class="font-extrabold text-4xl text-gray-800">{{ $title }}</p>
        </div>

        @if (!empty($users))
            <div class="grid grid-cols-1 gap-3 mt-6">
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

        {{-- @if (!empty($schoolclasses))
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
                @foreach ($schoolclasses as $schoolclass)
                    <a href="{{ route('schoolclass.show', $schoolclass->id) }}"
                        class="group flex flex-col justify-center items-center bg-gradient-to-r from-white to-gray-50 rounded-lg shadow-lg p-6 hover:bg-gradient-to-r hover:from-gray-50 hover:to-white transition-transform transform hover:-translate-y-2 duration-300 block">

                        <p class="text-gray-800 font-semibold mb-3 text-lg">{{ $schoolclass->name }}</p>

                        <div class="flex -space-x-3 mb-3">
                            @foreach ($schoolclass->students->take(10) as $student)
                                <img src="{{ asset('images/kaio.jpg') }}" alt="Foto do Usuário"
                                    class="w-8 h-8 rounded-full border-2 border-white shadow-sm">
                            @endforeach

                            @if ($schoolclass->students->count() > 10)
                                <div
                                    class="w-8 h-8 bg-gray-400 text-white flex items-center justify-center rounded-full text-xs font-semibold border-2 border-white shadow-sm">
                                    +{{ $schoolclass->students->count() - 10 }}
                                </div>
                            @endif
                        </div>

                        <p class="text-sm text-gray-500 group-hover:text-gray-700 transition">
                            {{ $schoolclass->students->count() }} Alunos</p>
                    </a>
                @endforeach
            </div>
        @endif --}}

        @if (!empty($schoolclasses))
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
                @foreach ($schoolclasses as $schoolclass)
                    <a href="{{ route('schoolclass.show', $schoolclass->id) }}"
                        class="group flex flex-col justify-center items-center bg-gradient-to-r from-white to-gray-50 rounded-lg shadow-lg p-6 hover:bg-gradient-to-r hover:from-gray-50 hover:to-white transition-transform transform hover:-translate-y-2 duration-300 block">

                        <p class="text-gray-800 font-semibold mb-3 text-lg">{{ $schoolclass->name }}</p>

                        <div class="carousel-container relative overflow-hidden mb-3 w-32 h-8">
                            <div class="carousel-images flex items-center group-hover:animate-carousel">
                                @foreach ($schoolclass->students->take(10) as $student)
                                    <img src="{{ asset('images/kaio.jpg') }}" alt="Foto do Usuário"
                                        class="w-8 h-8 rounded-full border-2 border-white shadow-sm -ml-3 first:ml-0">
                                @endforeach

                                @if ($schoolclass->students->count() > 10)
                                    <div
                                        class="w-8 h-8 bg-gray-400 text-white flex items-center justify-center rounded-full text-xs font-semibold border-2 border-white shadow-sm -ml-3">
                                        +{{ $schoolclass->students->count() - 10 }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <p class="text-sm text-gray-500 group-hover:text-gray-700 transition">
                            {{ $schoolclass->students->count() }} Alunos
                        </p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
<style>
    .carousel-container {
        width: 8rem;
        overflow: hidden;
    }

    .carousel-images {
        display: flex;
        animation: carousel 5s linear infinite paused;
    }

    .group:hover .carousel-images {
        animation-play-state: running;
    }

    .carousel-images img,
    .carousel-images div {
        margin-left: -0.75rem;
    }

    @keyframes carousel {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>
