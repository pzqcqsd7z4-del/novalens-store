@extends('layouts.app')
@section('title','Criar conta — NovaLens Store')
@section('content')
<div class="grid lg:grid-cols-2 max-w-5xl mx-auto bg-white rounded-[32px] border border-slate-100 overflow-hidden shadow-soft">
 <div class="hidden lg:flex flex-col justify-between p-12 bg-[#fff0e6] relative overflow-hidden min-h-[650px]"><div class="absolute rounded-full w-[450px] h-[450px] bg-[#f9b272] -right-48 -bottom-36 blur-3xl opacity-70"></div><div class="relative"><span class="bg-white/65 text-danger rounded-full px-4 py-2 text-xs font-extrabold uppercase tracking-widest">Começa aqui</span><h2 class="font-display font-extrabold text-5xl tracking-[-.05em] mt-8 leading-tight">Mais do que<br>uma loja<span class="text-danger">.</span></h2><p class="text-slate-600 mt-5 leading-7">Cria a tua conta, guarda as tuas encomendas e explora a tecnologia de outra forma.</p></div><img src="{{asset('images/capa.svg')}}" class="relative w-80 rounded-[25px] -rotate-6 border-8 border-white/50 shadow-soft" alt="Ilustração de capa de telemóvel"></div>
 <div class="p-7 sm:p-12 lg:p-14 flex flex-col justify-center">
  <p class="text-danger text-xs uppercase tracking-[.22em] font-extrabold">Junta-te à NovaLens</p><h1 class="font-display text-4xl font-extrabold tracking-[-.05em] mt-3">Criar conta<span class="text-danger">.</span></h1><p class="text-muted mt-3 mb-9">Já tens conta? <a class="text-danger font-bold hover:underline" href="{{route('login')}}">Inicia sessão</a>.</p>
  <form method="post" action="{{route('register.store')}}" class="space-y-4">@csrf
  <label class="block text-sm font-bold" for="name">Nome completo<input id="name" class="field mt-2" name="name" required maxlength="255" autocomplete="name" value="{{old('name')}}" placeholder="O teu nome"></label>
  <label class="block text-sm font-bold" for="email">Email<input id="email" class="field mt-2" type="email" name="email" required autocomplete="email" value="{{old('email')}}" placeholder="nome@exemplo.pt"></label>
  <label class="block text-sm font-bold" for="password">Palavra-passe <span class="font-normal text-muted">(mínimo 8 caracteres)</span><input id="password" class="field mt-2" type="password" name="password" required minlength="8" autocomplete="new-password" placeholder="Criar palavra-passe"></label>
  <label class="block text-sm font-bold" for="password_confirmation">Confirmar palavra-passe<input id="password_confirmation" class="field mt-2" type="password" name="password_confirmation" required minlength="8" autocomplete="new-password" placeholder="Repetir palavra-passe"></label>
  <button type="submit" class="btn-dark w-full !mt-7">Criar conta →</button></form>
  <p class="text-xs text-muted text-center mt-6">Conta criada apenas para esta demonstração escolar.</p>
 </div>
</div>
@endsection