@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-8">Criar conta</h1><form class="max-w-lg bg-white p-7 rounded-2xl border space-y-4" method="post" action="{{route('register.store')}}">@csrf
<label class="block">Nome<input class="border rounded-lg w-full p-3 mt-1" name="name" required value="{{old('name')}}"></label>
<label class="block">Email<input class="border rounded-lg w-full p-3 mt-1" type="email" name="email" required value="{{old('email')}}"></label>
<label class="block">Palavra-passe (mínimo 8 caracteres)<input class="border rounded-lg w-full p-3 mt-1" type="password" name="password" required></label>
<label class="block">Confirmar palavra-passe<input class="border rounded-lg w-full p-3 mt-1" type="password" name="password_confirmation" required></label>
<button class="bg-slate-900 text-white px-6 py-3 rounded-xl">Registar</button></form>
@endsection
