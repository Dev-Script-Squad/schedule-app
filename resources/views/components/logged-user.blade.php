<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="relative w-full">
    <div class="top-0 right-0 flex items-center p-4 ml-10">
        <h2 class="mr-4">Usuário logado: {{ auth()->user()->name }}</h2>
        <x-logout />
    </div>
</div>