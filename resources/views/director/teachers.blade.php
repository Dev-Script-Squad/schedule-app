@extends('layouts.default')

@section('content')
    <div class="container mx-auto px-4 py-0 min-h-screen">
        <div class="user-info">
            <x-logged-user />
        </div>
        <x-tables :users="$users" title="Lista de Professores" />
    </div>
@endsection
