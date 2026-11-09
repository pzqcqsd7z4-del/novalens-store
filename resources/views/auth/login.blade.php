@extends('layouts.app')
@section('title','Entrar — NovaLens Store')
@section('content')
<div class="grid lg:grid-cols-2 max-w-5xl mx-auto bg-white rounded-[32px] border border-slate-100 overflow-hidden shadow-soft">
 <div class="hidden lg:flex flex-col justify-between p-12 bg-ink text-white relative overflow-hidden min-h-[590px]"><div class="absolute rounded-full w-[450px] h-[450px] bg-[#751f27] -right-52 -bottom-40 blur-3xl opacity-80"></div><div class="relative"><span class="bg-white/10 rounded-full px-4 py-2 text-xs font-bold tracking-widest uppercase text-flame">Bem-vindo de volta</span><h2 class="font-display font-extrabold text-5xl tracking-[-.05em] mt-8 leading-tight">A tua loja.<br><span class="text-flame">O teu espaço.</span></h2><p class="text-slate-300 mt-5 leading-7">Entra para acompanhar encomendas e continua a descobrir produtos feitos para ti.</p></div><img src="{{asset('images/camaras.svg')}}" class="relative w-80 rounded-[25px] -rotate-6 border-8 border-white/10 shadow-2xl" alt="Ilustração de câmara"></div>
 <div class="p-7 sm:p-12 lg:p-14 flex flex-col justify-center">
  <p class="text-danger text-xs uppercase tracking-[.22em] font-extrabold">Área de cliente</p><h1 class="font-display text-4xl font-extrabold tracking-[-.05em] mt-3">Entrar na conta<span class="text-danger">.</span></h1><p class="text-muted mt-3 mb-9">Ainda não tens conta? <a class="text-danger font-bold hover:underline" href="{{route('register')}}">Regista-te aqui</a>.</p>
  <form method="post" action="{{route('login.store')}}" class="space-y-5">@csrf
  <label class="block text-sm font-bold" for="email">Email<input id="email" class="field mt-2" type="email" name="email" autocomplete="email" value="{{old('email')}}" placeholder="nome@exemplo.pt" required></label>
  <label class="block text-sm font-bold" for="password">Palavra-passe<input id="password" class="field mt-2" type="password" name="password" autocomplete="current-password" placeholder="A tua palavra-passe" required></label>
  <button type="submit" class="btn-dark w-full mt-4">Entrar na minha conta →</button></form>
  <p class="text-xs text-muted text-center mt-7">Ambiente demonstrativo — protege as tuas credenciais.</p>
 </div>
</div>
@endsection