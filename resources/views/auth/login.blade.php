@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-8">Entrar</h1><form class="max-w-lg bg-white p-7 rounded-2xl border space-y-4" method="post" action="{{route('login.store')}}">@csrf
<label class="block">Email<input class="border rounded-lg w-full p-3 mt-1" type="email" name="email" required value="{{old('email')}}"></label>
<label class="block">Palavra-passe<input class="border rounded-lg w-full p-3 mt-1" type="password" name="password" required></label>
<button class="bg-slate-900 text-white px-6 py-3 rounded-xl">Entrar</button></form>
@endsection
