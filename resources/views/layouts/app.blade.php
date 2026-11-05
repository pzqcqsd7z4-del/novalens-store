<!DOCTYPE html>
<html lang="pt"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>NovaLens Store</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-900 min-h-screen">
<header class="bg-slate-950 text-white"><nav class="max-w-6xl mx-auto px-5 py-5 flex flex-wrap justify-between gap-4 items-center">
<a href="{{ route('home') }}" class="text-2xl font-black tracking-tight">NOVA<span class="text-cyan-400">LENS</span></a>
<div class="flex flex-wrap gap-5 items-center text-sm"><a href="{{route('home')}}">Loja</a><a href="{{route('cart.index')}}">Carrinho ({{array_sum(session('cart',[]))}})</a>
@auth <a href="{{route('orders.index')}}">Encomendas</a>@if(auth()->user()->is_admin)<a href="{{route('admin.produtos.index')}}">Admin</a>@endif
<form method="post" action="{{route('logout')}}">@csrf<button>Sair</button></form>
@else <a href="{{route('login')}}">Entrar</a><a href="{{route('register')}}">Registar</a>@endauth</div></nav></header>
<main class="max-w-6xl mx-auto p-5 py-10">
@if(session('success'))<p class="mb-6 rounded-xl bg-green-100 text-green-900 p-4">{{session('success')}}</p>@endif
@if($errors->any())<div class="mb-6 rounded-xl bg-red-100 text-red-900 p-4"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@yield('content')
</main><footer class="mt-16 border-t text-center text-sm text-slate-500 p-8">NovaLens Store · Projeto escolar · Sem pagamentos reais</footer></body></html>
