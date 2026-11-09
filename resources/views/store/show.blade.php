@extends('layouts.app')
@section('title',$product->name.' — NovaLens Store')
@section('content')
<nav class="text-xs sm:text-sm text-muted mb-8"><a class="hover:text-flame" href="{{route('home')}}">Início</a><span class="mx-2">/</span><a class="hover:text-flame" href="{{route('home',['categoria'=>$product->category->slug])}}">{{$product->category->name}}</a><span class="mx-2">/</span><span class="text-ink font-semibold">{{$product->name}}</span></nav>
<div class="grid lg:grid-cols-2 gap-8 lg:gap-14 items-start">
 <div class="rounded-[32px] bg-[#f0f0f2] overflow-hidden border border-slate-100 min-h-[350px] lg:min-h-[520px] grid place-items-center">
 @if($product->image_url)<img src="{{$product->image_url}}" alt="{{$product->name}}" class="w-full h-full max-h-[550px] object-contain">@else<div class="font-display font-extrabold text-8xl text-slate-300">N.</div>@endif
 </div>
 <div class="lg:py-8">
  <span class="inline-flex rounded-full px-4 py-2 bg-orange-50 text-danger uppercase tracking-widest font-extrabold text-xs">{{$product->category->name}}</span>
  <h1 class="font-display font-extrabold text-4xl md:text-5xl tracking-[-.05em] mt-6 leading-tight">{{$product->name}}</h1>
  <p class="text-muted leading-8 mt-5 text-lg">{{$product->description?:'Um essencial pensado para complementar o teu dia a dia.'}}</p>
  <div class="h-px bg-slate-200 my-8"></div>
  <p class="font-display text-4xl font-extrabold tracking-tight">{{number_format($product->price,2,',','.')}} €</p>
  @if($product->stock>0)<p class="mt-3 text-sm text-danger font-bold">● Em stock · {{$product->stock}} disponível(eis)</p>
  <form method="post" action="{{route('cart.add',$product)}}" class="flex flex-wrap gap-3 mt-8 items-end">@csrf
   <label class="text-xs text-muted font-bold">Quantidade <input name="quantity" type="number" min="1" max="{{$product->stock}}" value="1" required class="field mt-2 w-24"></label>
   <button class="btn-dark flex-1 sm:flex-none sm:min-w-64 min-h-[52px]">Adicionar ao carrinho <span aria-hidden="true">→</span></button>
  </form>
  @else<p class="mt-4 font-bold text-red-600">Esgotado neste momento</p>@endif
  <div class="mt-9 rounded-2xl bg-white border border-slate-100 p-5 space-y-4 text-sm"><div class="flex gap-3"><span class="font-bold text-danger">✓</span><span>Informação do produto sempre visível</span></div><div class="flex gap-3"><span class="font-bold text-danger">✓</span><span>Processo de encomenda simples e demonstrativo</span></div><div class="flex gap-3"><span class="font-bold text-danger">✓</span><span>Sem pagamentos reais neste projeto académico</span></div></div>
 </div>
</div>
<section class="mt-14 rounded-[26px] bg-ink p-8 md:p-10 text-white flex flex-wrap items-center justify-between gap-5"><div><p class="text-flame text-xs uppercase tracking-widest font-extrabold">Continua a explorar</p><h2 class="font-display font-extrabold text-2xl mt-2">Há mais para descobrir.</h2></div><a href="{{route('home')}}" class="bg-flame text-ink rounded-xl font-extrabold px-6 py-3">Ver todos os produtos →</a></section>
@endsection