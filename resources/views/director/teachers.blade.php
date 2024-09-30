@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-0 min-h-screen">
        <div class="user-info">
            <x-logged-user />
        </div>
        {{-- <div class="flex justify-center items-center mb-6">
            <p class="font-bold text-3xl text-gray-800">{{ $title }}</p>
            <x-add-register-modal class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
        </div> --}}
        <x-tables :users="$users" title="Lista de Professores" />
    </div>
@endsection
