@extends('layouts.app')
@section('title','NovaLens Store — Capas, acessórios e câmaras')
@section('content')
<section class="relative rounded-[32px] overflow-hidden bg-ink text-white min-h-[480px] flex items-center">
  <div class="absolute inset-0 pointer-events-none overflow-hidden"><div class="absolute w-[540px] h-[540px] rounded-full bg-[#671d20] right-[-140px] top-[-190px] blur-2xl opacity-70"></div><div class="absolute w-[320px] h-[320px] rounded-full bg-[#f97316] right-16 bottom-[-175px] blur-2xl opacity-70"></div></div>
  <div class="relative z-10 grid lg:grid-cols-2 gap-6 items-center w-full px-8 py-12 sm:px-14 lg:px-20">
   <div class="max-w-xl">
    <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-[11px] uppercase tracking-[.2em] font-bold"><span class="h-2 w-2 rounded-full bg-flame"></span> O teu mundo, mais criativo</span>
    <h1 class="font-display font-extrabold leading-[1.07] tracking-[-.055em] text-5xl sm:text-6xl xl:text-[70px] mt-7">Capta mais.<br><span class="text-flame">Vive melhor.</span></h1>
    <p class="mt-6 text-slate-300 leading-7 text-base sm:text-lg max-w-md">Capas que protegem, acessórios que ajudam e câmaras para não perder nenhum momento.</p>
    <div class="mt-8 flex flex-wrap items-center gap-4"><a href="#colecao" class="bg-flame text-ink rounded-2xl font-extrabold px-7 py-4 hover:bg-white transition">Explorar produtos <span aria-hidden="true">↗</span></a><span class="text-xs font-semibold text-slate-300">Design. Utilidade. Criatividade.</span></div>
   </div>
   <div class="relative hidden lg:flex justify-center items-center min-h-[380px]">
    <div class="absolute w-72 h-72 rounded-full border border-white/20"></div><div class="absolute w-96 h-96 rounded-full border border-white/10"></div>
    <img src="{{asset('images/camaras.svg')}}" alt="Ilustração de uma câmara" class="relative z-10 w-[390px] rounded-[26px] shadow-2xl rotate-[-7deg] border-8 border-white/10">
    <div class="absolute right-0 bottom-6 bg-white text-ink shadow-soft rounded-2xl p-4 z-20 rotate-6"><p class="text-[10px] text-muted uppercase font-extrabold tracking-widest">Em destaque</p><p class="font-display font-extrabold text-lg">Novas perspetivas.</p></div>
   </div>
  </div>
</section>
<section class="grid md:grid-cols-3 gap-3 sm:gap-5 mt-6 mb-14" aria-label="Vantagens">
 @foreach([['↗','Escolhas inteligentes','Produtos para o dia a dia'],['◉','Feito para criar','Fotografia e tecnologia'],['✦','Experiência simples','Do catálogo ao carrinho']] as $benefit)
 <div class="bg-white rounded-2xl border border-slate-100 p-5 flex items-center gap-4"><span class="w-12 h-12 shrink-0 rounded-2xl bg-orange-50 text-danger text-2xl grid place-items-center">{{$benefit[0]}}</span><div><p class="font-display font-extrabold text-sm">{{$benefit[1]}}</p><p class="text-xs text-muted mt-1">{{$benefit[2]}}</p></div></div>
 @endforeach
</section>
<section class="mb-14">
<div class="flex items-end justify-between gap-4 mb-6"><div><p class="text-danger uppercase tracking-[.22em] text-xs font-extrabold mb-2">Descobre a coleção</p><h2 class="font-display text-3xl md:text-4xl font-extrabold tracking-[-.04em]">Encontra o teu próximo essencial.</h2></div></div>
<div class="grid md:grid-cols-3 gap-5">
 <a href="{{route('home',['categoria'=>'capas'])}}#colecao" class="group relative rounded-[26px] bg-[#f5eded] p-7 min-h-[220px] overflow-hidden flex flex-col justify-between"><span class="relative z-10 uppercase text-xs font-bold tracking-widest text-danger">01 · Proteção</span><div class="relative z-10"><h3 class="font-display font-extrabold text-2xl">Capas</h3><p class="text-sm text-slate-600 mt-2">Proteção com personalidade</p></div><img src="{{asset('images/capa.svg')}}" alt="" class="absolute w-52 h-40 object-cover rounded-2xl top-10 -right-7 rotate-[-12deg] opacity-75 product-image"></a>
 <a href="{{route('home',['categoria'=>'acessorios'])}}#colecao" class="group relative rounded-[26px] bg-[#e7e7ea] p-7 min-h-[220px] overflow-hidden flex flex-col justify-between"><span class="relative z-10 uppercase text-xs font-bold tracking-widest text-slate-700">02 · Praticidade</span><div class="relative z-10"><h3 class="font-display font-extrabold text-2xl">Acessórios</h3><p class="text-sm text-slate-600 mt-2">Tudo funciona melhor</p></div><img src="{{asset('images/acessorios.svg')}}" alt="" class="absolute w-52 h-40 object-cover rounded-2xl top-10 -right-7 rotate-[-12deg] opacity-75 product-image"></a>
 <a href="{{route('home',['categoria'=>'camaras'])}}#colecao" class="group relative rounded-[26px] bg-[#fff0e5] p-7 min-h-[220px] overflow-hidden flex flex-col justify-between"><span class="relative z-10 uppercase text-xs font-bold tracking-widest text-orange-900">03 · Criatividade</span><div class="relative z-10"><h3 class="font-display font-extrabold text-2xl">Câmaras</h3><p class="text-sm text-slate-600 mt-2">O momento é agora</p></div><img src="{{asset('images/camaras.svg')}}" alt="" class="absolute w-52 h-40 object-cover rounded-2xl top-10 -right-7 rotate-[-12deg] opacity-75 product-image"></a>
</div>
</section>
<section id="colecao" class="scroll-mt-32">
 <div class="flex flex-wrap items-end justify-between gap-4 mb-6"><div><p class="text-danger uppercase tracking-[.22em] text-xs font-extrabold mb-2">A tua seleção</p><h2 class="font-display text-3xl md:text-4xl font-extrabold tracking-[-.04em]">Os nossos produtos<span class="text-danger">.</span></h2></div><p class="text-sm text-muted">{{$products->total()}} produto(s) encontrados</p></div>
 <form method="get" action="{{route('home')}}#colecao" class="bg-white rounded-[22px] p-4 border border-slate-100 mb-7 flex flex-col md:flex-row gap-3">
  <label class="sr-only" for="search">Pesquisar produtos</label>
  <input id="search" name="q" value="{{request('q')}}" placeholder="Pesquisar pelo nome do produto..." class="field flex-1">
  <label class="sr-only" for="category">Categoria</label><select id="category" name="categoria" class="field md:w-56"><option value="">Todas as categorias</option>@foreach($categories as $category)<option value="{{$category->slug}}" @selected(request('categoria')===$category->slug)>{{$category->name}}</option>@endforeach</select>
  <button class="btn-dark md:min-w-32">Pesquisar <span aria-hidden="true">→</span></button>
 </form>
 <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
 @forelse($products as $product)
 <article class="group bg-white rounded-[24px] border border-slate-100 overflow-hidden hover:shadow-soft transition-shadow">
   <a href="{{route('products.show',$product)}}" class="block relative h-60 bg-[#f2f2f3] overflow-hidden">
     @if($product->image_url)<img src="{{$product->image_url}}" alt="{{$product->name}}" loading="lazy" class="product-image h-full w-full object-cover">@else <div class="h-full grid place-items-center text-slate-300 font-display text-6xl font-extrabold">N.</div>@endif
     <span class="absolute left-4 top-4 px-3 py-1.5 bg-white/95 rounded-full text-[11px] font-extrabold">{{$product->category->name}}</span>
   </a>
   <div class="p-5 sm:p-6">
     <p class="text-[11px] font-extrabold text-danger uppercase tracking-[.15em]">{{$product->stock>0?'Disponível':'Esgotado'}}</p>
     <a href="{{route('products.show',$product)}}"><h3 class="font-display font-extrabold text-lg mt-2 hover:text-flame min-h-14">{{$product->name}}</h3></a>
     <div class="flex justify-between items-center gap-3 mt-5"><p class="font-display text-2xl font-extrabold">{{number_format($product->price,2,',','.')}} €</p>
     @if($product->stock>0)<form method="post" action="{{route('cart.add',$product)}}">@csrf<input type="hidden" name="quantity" value="1"><button aria-label="Adicionar {{$product->name}} ao carrinho" class="bg-ink text-white w-11 h-11 rounded-xl text-xl hover:bg-danger transition">+</button></form>@else<span class="text-xs font-semibold text-muted">Indisponível</span>@endif</div>
   </div>
 </article>
 @empty
 <div class="sm:col-span-2 lg:col-span-3 bg-white rounded-3xl p-12 text-center"><h3 class="font-display font-extrabold text-2xl">Não encontramos produtos.</h3><p class="text-muted mt-3">Experimenta outra pesquisa ou categoria.</p><a class="btn-dark mt-6" href="{{route('home')}}#colecao">Ver todos</a></div>
 @endforelse
 </div><div class="mt-8">{{$products->links()}}</div>
</section>
<section class="mt-16 rounded-[30px] bg-flame px-8 py-10 md:p-14 flex flex-col md:flex-row items-start md:items-center justify-between gap-6"><div><p class="text-danger text-xs font-extrabold tracking-[.2em] uppercase mb-3">Menos complicações. Mais criatividade.</p><h2 class="font-display font-extrabold text-3xl md:text-4xl tracking-tight">O próximo clique é teu.</h2></div><a href="{{route('home',['categoria'=>'camaras'])}}#colecao" class="btn-dark">Explorar câmaras <span aria-hidden="true">↗</span></a></section>
@endsection