@extends('master')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <Login :login-url="'{{ route('user.login') }}'" csrf-token="{{ csrf_token() }}"></Login>
@endsection
