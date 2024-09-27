<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container flex justify-end items-center w-50">
  <h2>Usuário logado: {{ auth()->user()->name }}</h2>
  <x-logout />
</div>