@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="flex justify-between w-full max-w-[860.8px]">
            <div>
                <x-add-register-modal class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" />
            </div>
            <div class="user-info">
                <x-logged-user />
            </div>
        </div>

        <div class="w-full"> 
            <x-tables :users="$users" title="Lista de Alunos" />
        </div>

    </div>
@endsection
