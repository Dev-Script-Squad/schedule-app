@extends('master')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <x-validation-error />
    <div class="flex flex-col lg:flex-row justify-center items-center h-screen p-4 lg:p-0">
        <div class="w-full max-w-sm mb-1 lg:mb-0">
            <img class="" src="{{ asset('images/leftImage.svg') }}" alt="">
        </div>
        <div class="w-full max-w-sm">
            <form action="{{ route('user.login') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex mb-9 justify-center items-center ">
                    <img class="" src="{{ asset('images/smile.svg') }}" alt="">
                </div>
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Email">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input type="password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Senha">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Entrar
                    </button>
                    <a href="esqueciasenha.com"
                        class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Esqueci a senha
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
