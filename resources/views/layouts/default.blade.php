<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-900">
    <div class="backdrop-blur-md w-64 h-auto rounded-2xl mt-12 ml-12 fixed bg-neutral-400/50 text-white p-5 shadow-lg transition-all duration-300 ease-in-out z-10">
        <div class="p-3 text-2xl text-center border-b border-white/50">
            <h2>Menu</h2>
        </div>
        <ul class="sidebar-nav list-none mt-5 flex flex-col justify-center">
            <li class="my-3">
                <a href="/calendar"
                   class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700">Calendário</a>
            </li>
            <li class="my-3">
                <a href="/students" class="flex items-center text-white no-underline text-lg p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700">
                    <img class="w-6 h-6 mr-3" alt="Ícone de Alunos" src="{{ asset('images/diplomadosvg.svg') }}">
                    Alunos
                </a>
            </li>
            <li class="my-3">
                <a href="/teachers"
                   class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700">Professores</a>
            </li>
            <li class="my-3">
                <a href="/school-classes"
                   class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700">Turmas</a>
            </li>
            <li class="my-3">
                <a href="/users"
                   class="text-white no-underline text-lg block p-3 rounded-md transition-colors duration-300 ease-in-out hover:bg-gray-700">Usuários</a>
            </li>
        </ul>
    </div>

    <div class="main-content ml-72 p-5 transition-margin duration-300  ease-in-out min-h-screen">
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
