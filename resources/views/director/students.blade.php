@extends('layouts.default')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container">
        <div class="user-info">
            <x-logged-user />
        </div>
        <div class="flex justify-between">
            <p class="font-bold text-3xl">Lista de Alunos</p>
            <x-add-register-modal />
        </div>
        <x-users-table :users="$users" />
    </div>
@endsection
