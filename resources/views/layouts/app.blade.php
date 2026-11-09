<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#101519">
<meta name="description" content="NovaLens Store — capas, acessórios e câmaras para o teu dia a dia. Loja demonstrativa.">
<title>@yield('title', 'NovaLens Store — Tecnologia com estilo')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {theme:{extend:{fontFamily:{sans:['DM Sans','sans-serif'],display:['Manrope','sans-serif']},colors:{ink:'#101519',muted:'#6b737b',paper:'#f7f8f8',mint:'#b8f8d2',forest:'#176646'},boxShadow:{soft:'0 14px 46px -24px rgba(12,25,30,.22)'}}}}
</script>
<style>
html{scroll-behavior:smooth}body{font-family:'DM Sans',sans-serif}h1,h2,h3,h4{font-family:'Manrope',sans-serif}
::selection{background:#b8f8d2;color:#101519}
:focus-visible{outline:3px solid #16a36c;outline-offset:3px}
.product-image{transition:transform .45s cubic-bezier(.2,.8,.2,1)}
.group:hover .product-image{transform:scale(1.055)}
.field{width:100%;border:1px solid #e1e5e5;border-radius:15px;padding:13px 15px;background:white;outline:none;transition:border .2s,box-shadow .2s}
.field:focus{border-color:#2e9b73;box-shadow:0 0 0 4px #b8f8d255}
.btn-dark{background:#101519;color:#fff;border-radius:15px;padding:13px 20px;font-weight:700;display:inline-flex;align-items:center;justify-content:center;gap:10px;transition:background .2s,transform .2s}
.btn-dark:hover{background:#25433a;transform:translateY(-1px)}
.btn-light{background:#fff;color:#101519;border:1px solid #e5e8e8;border-radius:15px;padding:12px 18px;font-weight:700;display:inline-flex;align-items:center;justify-content:center;gap:8px;transition:border .2s}
.btn-light:hover{border-color:#a8cbbc}
</style>
</head>
<body class="bg-paper text-ink antialiased min-h-screen flex flex-col">
<div class="bg-ink text-white text-center px-4 py-2.5 text-[11px] sm:text-xs tracking-[.13em] font-semibold uppercase">Projeto escolar · Compras demonstrativas, sem pagamentos reais</div>
<header class="bg-white/95 border-b border-slate-100 sticky top-0 z-40 backdrop-blur-lg">
  <div class="max-w-7xl mx-auto px-5 sm:px-8 h-[76px] flex items-center gap-6">
    <a href="{{route('home')}}" aria-label="NovaLens — página inicial" class="flex items-center gap-2.5 shrink-0">
      <span class="w-10 h-10 rounded-2xl bg-ink text-mint flex items-center justify-center text-xl font-extrabold">N.</span>
      <span class="font-display font-extrabold tracking-[-.06em] text-[22px]">nova<span class="text-forest">lens</span><span class="text-[10px] text-muted tracking-normal ml-1 font-semibold">store</span></span>
    </a>
    <nav class="hidden lg:flex items-center gap-8 mx-auto text-sm font-bold text-slate-600" aria-label="Navegação principal">
      <a href="{{route('home')}}" class="hover:text-forest transition">Descobrir</a>
      <a href="{{route('home',['categoria'=>'capas'])}}" class="hover:text-forest transition">Capas</a>
      <a href="{{route('home',['categoria'=>'acessorios'])}}" class="hover:text-forest transition">Acessórios</a>
      <a href="{{route('home',['categoria'=>'camaras'])}}" class="hover:text-forest transition">Câmaras</a>
    </nav>
    <div class="ml-auto flex items-center gap-2 sm:gap-4">
      @auth
      <a href="{{route('orders.index')}}" class="hidden md:inline text-sm font-bold hover:text-forest">Encomendas</a>
      @if(auth()->user()->is_admin)<a href="{{route('admin.produtos.index')}}" class="hidden md:inline text-sm font-bold hover:text-forest">Admin</a>@endif
      @else
      <a href="{{route('login')}}" class="hidden sm:inline text-sm font-bold hover:text-forest">Entrar</a>
      @endauth
      <a href="{{route('cart.index')}}" class="flex items-center gap-2 rounded-full bg-slate-100 hover:bg-mint px-4 py-2.5 transition" aria-label="Ver carrinho">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3h2l2 12h12l2-9H6"/><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/></svg>
        <span class="text-xs font-extrabold">{{array_sum(session('cart',[]))}}</span>
      </a>
      <details class="lg:hidden relative">
        <summary class="cursor-pointer list-none rounded-xl border border-slate-200 px-3 py-2.5 text-sm font-bold">Menu</summary>
        <nav class="absolute right-0 top-12 w-52 bg-white rounded-2xl border shadow-soft p-4 flex flex-col gap-4 text-sm font-semibold z-50">
          <a href="{{route('home')}}">Loja</a><a href="{{route('home',['categoria'=>'capas'])}}">Capas</a><a href="{{route('home',['categoria'=>'acessorios'])}}">Acessórios</a><a href="{{route('home',['categoria'=>'camaras'])}}">Câmaras</a>
          @auth<a href="{{route('orders.index')}}">Encomendas</a>@if(auth()->user()->is_admin)<a href="{{route('admin.produtos.index')}}">Admin</a>@endif
          <form method="post" action="{{route('logout')}}">@csrf<button class="font-bold text-red-600">Sair</button></form>
          @else<a href="{{route('login')}}">Entrar</a><a href="{{route('register')}}">Criar conta</a>@endauth
        </nav>
      </details>
      @auth
      <form method="post" action="{{route('logout')}}" class="hidden lg:block">@csrf<button class="text-sm text-muted hover:text-ink font-semibold">Sair</button></form>
      @endauth
    </div>
  </div>
</header>
<main class="flex-1 w-full max-w-7xl mx-auto px-5 sm:px-8 py-8 md:py-12">
@if(session('success'))<div role="status" class="mb-7 rounded-2xl border border-green-200 bg-green-50 text-forest px-5 py-4 text-sm font-semibold">{{session('success')}}</div>@endif
@if($errors->any())<div role="alert" class="mb-7 rounded-2xl border border-red-200 bg-red-50 text-red-800 px-5 py-4"><p class="font-bold mb-2">Verifica os seguintes campos:</p><ul class="list-disc ml-5 text-sm">@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif
@yield('content')
</main>
<footer class="bg-ink text-white mt-12">
 <div class="max-w-7xl mx-auto px-5 sm:px-8 py-12 grid gap-8 md:grid-cols-3">
  <div><div class="font-display font-extrabold text-2xl tracking-tight">nova<span class="text-mint">lens.</span></div><p class="text-slate-400 text-sm mt-4 max-w-xs leading-6">Tecnologia útil, design simples e escolhas que fazem sentido para ti.</p></div>
  <div><p class="uppercase tracking-[.2em] font-bold text-xs text-slate-400 mb-4">Explorar</p><div class="flex flex-col gap-2 text-sm"><a href="{{route('home',['categoria'=>'capas'])}}" class="hover:text-mint">Capas</a><a href="{{route('home',['categoria'=>'acessorios'])}}" class="hover:text-mint">Acessórios</a><a href="{{route('home',['categoria'=>'camaras'])}}" class="hover:text-mint">Câmaras</a></div></div>
  <div><p class="uppercase tracking-[.2em] font-bold text-xs text-slate-400 mb-4">Informação</p><p class="text-sm text-slate-400 leading-6">Projeto académico desenvolvido em Laravel. Os produtos e as encomendas são demonstrativos; não existem pagamentos reais.</p></div>
 </div>
 <div class="border-t border-white/10 max-w-7xl mx-auto px-5 sm:px-8 py-5 text-xs text-slate-400 flex flex-wrap justify-between gap-2"><span>© {{date('Y')}} NovaLens Store</span><span>Desenvolvido para aprender. Pensado para impressionar.</span></div>
</footer>
</body></html>