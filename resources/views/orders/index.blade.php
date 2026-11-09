@extends('layouts.app')
@section('title','As minhas encomendas — NovaLens Store')
@section('content')
<div class="flex flex-wrap justify-between gap-5 items-end mb-9"><div><p class="text-xs uppercase tracking-[.2em] font-extrabold text-forest mb-2">Área de cliente</p><h1 class="font-display text-4xl md:text-5xl tracking-[-.05em] font-extrabold">As minhas encomendas<span class="text-forest">.</span></h1><p class="text-muted mt-3">Acompanha os pedidos de demonstração.</p></div><a href="{{route('home')}}#colecao" class="btn-light">Explorar loja ↗</a></div>
<div class="space-y-5">
@forelse($orders as $order)
<article class="bg-white border border-slate-100 rounded-[26px] overflow-hidden">
 <div class="p-6 md:p-7 flex flex-wrap justify-between items-center gap-4 border-b border-slate-100"><div><p class="text-xs text-muted uppercase tracking-widest font-bold">Pedido #{{$order->id}}</p><h2 class="font-display font-extrabold text-lg mt-2">Encomenda de {{$order->created_at->format('d/m/Y')}}</h2><p class="text-xs text-muted mt-1">{{$order->created_at->format('H:i')}}</p></div><div class="text-right"><span class="inline-block bg-emerald-50 text-forest rounded-full px-4 py-2 text-xs font-extrabold">{{str_replace('_',' ',$order->status)}}</span><p class="font-display text-2xl font-extrabold mt-3">{{number_format($order->total,2,',','.')}} €</p></div></div>
 <div class="px-7 py-5"><p class="text-xs uppercase tracking-widest text-muted font-bold mb-3">Artigos</p><ul class="space-y-2">@foreach($order->items as $item)<li class="flex justify-between gap-4 text-sm"><span>{{$item->name}}</span><span class="font-semibold whitespace-nowrap">{{$item->quantity}} × {{number_format($item->unit_price,2,',','.')}} €</span></li>@endforeach</ul></div>
</article>
@empty
<div class="rounded-[30px] bg-white border border-slate-100 px-7 py-20 text-center"><h2 class="font-display text-2xl font-extrabold">Ainda sem encomendas.</h2><p class="text-muted mt-3">Explora os produtos e experimenta o checkout demonstrativo.</p><a href="{{route('home')}}#colecao" class="btn-dark mt-6">Ver produtos →</a></div>
@endforelse
</div>
@endsection