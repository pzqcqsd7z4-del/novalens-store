@extends('layouts.app')
@section('title','O teu carrinho — NovaLens Store')
@section('content')
<div class="mb-9"><p class="text-xs uppercase tracking-[.2em] font-extrabold text-forest mb-2">A tua seleção</p><h1 class="font-display text-4xl md:text-5xl tracking-[-.05em] font-extrabold">O teu carrinho<span class="text-forest">.</span></h1><p class="text-muted mt-3">Revê os produtos antes de concluir a encomenda.</p></div>
@php($total=0)
@if($products->count())
<div class="grid lg:grid-cols-[minmax(0,1fr)_340px] gap-7 items-start">
 <div class="space-y-4">
 @foreach($products as $product)
 @php($quantity=$cart[(string)$product->id]??0)
 @php($total+=(float)$product->price*$quantity)
 <article class="bg-white border border-slate-100 rounded-[24px] p-4 sm:p-6 flex flex-col sm:flex-row gap-5">
 <a href="{{route('products.show',$product)}}" class="w-full sm:w-36 h-44 sm:h-36 rounded-2xl bg-slate-100 overflow-hidden shrink-0">
 @if($product->image_url)<img src="{{$product->image_url}}" alt="{{$product->name}}" class="w-full h-full object-cover">@else<div class="h-full grid place-items-center text-slate-300 text-4xl font-extrabold">N.</div>@endif</a>
 <div class="flex-1 min-w-0"><p class="text-xs text-forest font-bold uppercase tracking-widest">{{$product->category->name}}</p><a href="{{route('products.show',$product)}}"><h2 class="font-display font-extrabold text-lg mt-1 hover:text-forest">{{$product->name}}</h2></a><p class="font-bold mt-3">{{number_format($product->price,2,',','.')}} € <span class="font-normal text-xs text-muted">/ unidade</span></p>
 <div class="mt-5 flex flex-wrap gap-3 items-center">
 <form method="post" action="{{route('cart.update',$product)}}" class="flex items-center gap-2">@csrf @method('PATCH')
 <label class="text-xs font-semibold text-muted" for="quantity-{{$product->id}}">Qtd.</label>
 <input id="quantity-{{$product->id}}" type="number" name="quantity" min="1" max="{{$product->stock}}" value="{{$quantity}}" required class="field !py-2 !px-3 w-20">
 <button class="text-xs font-bold px-3 py-2.5 rounded-xl bg-slate-100 hover:bg-mint">Atualizar</button></form>
 <form method="post" action="{{route('cart.remove',$product)}}">@csrf @method('DELETE')<button class="text-xs text-red-600 font-bold hover:underline">Remover</button></form>
 </div></div></article>
 @endforeach
 <a href="{{route('home')}}#colecao" class="inline-flex text-sm font-bold text-forest py-4">← Continuar a comprar</a>
 </div>
 <aside class="bg-white border border-slate-100 rounded-[26px] p-6 lg:sticky lg:top-28">
 <h2 class="font-display text-xl font-extrabold">Resumo</h2><div class="flex justify-between mt-7 text-sm"><span class="text-muted">Subtotal</span><span class="font-bold">{{number_format($total,2,',','.')}} €</span></div>
 <div class="flex justify-between mt-4 text-sm"><span class="text-muted">Entrega</span><span class="font-semibold text-forest">Simulação</span></div>
 <div class="border-t border-dashed my-6"></div><div class="flex items-center justify-between"><span class="font-display font-extrabold">Total</span><span class="font-display font-extrabold text-2xl">{{number_format($total,2,',','.')}} €</span></div>
 <a href="{{route('checkout.create')}}" class="btn-dark w-full mt-6">Finalizar encomenda →</a><p class="text-xs text-center mt-4 text-muted leading-5">Projeto escolar. Não serão cobrados pagamentos.</p>
 </aside>
</div>
@else
<div class="bg-white border border-slate-100 rounded-[30px] text-center px-8 py-20"><div class="w-20 h-20 rounded-3xl bg-emerald-50 text-forest mx-auto grid place-items-center text-4xl mb-6">◯</div><h2 class="font-display font-extrabold text-2xl">O carrinho está vazio.</h2><p class="text-muted mt-3">Ainda tens muito por descobrir na nossa coleção.</p><a href="{{route('home')}}#colecao" class="btn-dark mt-7">Descobrir produtos →</a></div>
@endif
@endsection