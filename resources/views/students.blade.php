@extends('master')

@section('content')
<div class="container">
  <h1>Lista de Alunos</h1>
  <h2> {{ auth()->user()->name }} </h2>
  <form action="{{ route('user.logout') }}" method="post">
    @csrf
    <button class="logout">Sair</button>
  </form>
  @if($users->isEmpty())
    <p>Não há alunos cadastrados.</p>
  @else
    <table>
    <thead>
      <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
      <a href="{{ route('user.show',$user->id) }}">Ver Detalhes</a>
      </td>
      </tr>
    @endforeach
    </tbody>
    </table>
  @endif
</div>
@endsection