@extends('layouts.app')
@section('title','Segurança da conta — NovaLens')
@section('content')
<div class="max-w-xl mx-auto">
<p class="text-danger uppercase text-xs font-extrabold tracking-widest mb-2">A tua conta</p>
<h1 class="font-display text-4xl font-extrabold mb-3">Segurança da conta<span class="text-danger">.</span></h1>
<p class="text-muted mb-8">Altera a palavra-passe regularmente e não a partilhes com ninguém.</p>
<form method="post" action="{{route('password.update')}}" class="bg-white p-7 sm:p-9 rounded-[26px] border border-slate-100 space-y-5">@csrf @method('PUT')
<label class="block font-bold text-sm">Palavra-passe atual<input class="field mt-2" type="password" name="current_password" autocomplete="current-password" required></label>
<label class="block font-bold text-sm">Nova palavra-passe<input class="field mt-2" type="password" name="password" autocomplete="new-password" minlength="10" required><span class="block text-muted text-xs font-normal mt-2">Mínimo 10 caracteres, incluindo maiúsculas, minúsculas, números e símbolos.</span></label>
<label class="block font-bold text-sm">Confirmar nova palavra-passe<input class="field mt-2" type="password" name="password_confirmation" autocomplete="new-password" minlength="10" required></label>
<button class="btn-dark w-full" type="submit">Guardar nova palavra-passe →</button>
</form></div>
@endsection