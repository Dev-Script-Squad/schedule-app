<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-900">
    <div
        class="backdrop-blur-md w-64 h-auto rounded-2xl mt-12 ml-12 fixed bg-neutral-400/50 text-white p-5 shadow-lg transition-all duration-300 ease-in-out z-10">
        <div class="p-3 text-2xl text-center border-b border-white/50">
            <h2>Menu</h2>
        </div>
        <ul class="sidebar-nav list-none mt-5 flex flex-col justify-center">
            <li class="my-3">
                <a href="/calendar"
                    class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700 {{ request()->is('calendar') ? 'bg-gray-400' : '' }}">Calendário</a>
            </li>
            <li class="my-3">
                <a href="/students"
                    class="flex items-center text-white no-underline text-lg p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700 {{ request()->is('students') ? 'bg-gray-400' : '' }}">
                    <img class="w-6 h-6 mr-3" alt="Ícone de Alunos" src="{{ asset('images/diplomadosvg.svg') }}">
                    Alunos
                </a>
            </li>
            <li class="my-3">
                <a href="/teachers"
                    class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700 {{ request()->is('teachers') ? 'bg-gray-400' : '' }}">Professores</a>
            </li>
            <li class="my-3">
                <a href="/school-classes"
                    class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700 {{ request()->is('school-classes') ? 'bg-gray-400' : '' }}">Turmas</a>
            </li>
            <li class="my-3">
                <a href="/users"
                    class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700 {{ request()->is('users') ? 'bg-gray-400' : '' }}">Usuários</a>
            </li>
        </ul>
    </div>

    @if (session('ok'))
        <div id="toast-default"
            class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
                </svg>
                <span class="sr-only">Fire icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Set yourself free.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-default" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="main-content ml-72 p-5 transition-margin duration-300 ease-in-out min-h-screen">
        @if ($errors->any())
            <div id="toast-danger"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Item has been deleted.</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        @yield('content')
    </div>

    <style>
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .backdrop-blur-md {
                position: relative;
                margin: 0;
                width: 100%;
            }
        }
    </style>

</body>

</html>
