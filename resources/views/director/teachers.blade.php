@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="user-info">
            <x-logged-user />
          </div>
          <h1>Lista de Professores</h1>
          <x-users-table :users="$users" />
    </div>
@endsection
