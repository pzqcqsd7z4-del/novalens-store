@extends('layouts.app')
@section('title','Gestão de produtos — NovaLens Admin')
@section('content')
<div class="flex flex-wrap justify-between items-end gap-5 mb-9"><div><p class="text-xs uppercase tracking-[.2em] font-extrabold text-danger mb-2">Painel de administração</p><h1 class="font-display text-4xl font-extrabold tracking-[-.05em]">Gerir produtos<span class="text-danger">.</span></h1><p class="text-muted mt-3">Organiza o catálogo e acompanha os artigos da loja.</p></div><div class="flex flex-wrap gap-3"><a href="{{route('admin.orders.index')}}" class="btn-light">Encomendas ↗</a><a href="{{route('admin.produtos.create')}}" class="btn-dark">+ Novo produto</a></div></div>
<div class="grid sm:grid-cols-3 gap-4 mb-8"><div class="bg-white rounded-[22px] border border-slate-100 p-6"><p class="text-xs text-muted uppercase tracking-widest font-bold">Nesta página</p><p class="font-display text-4xl font-extrabold mt-3">{{$products->count()}}</p><p class="text-xs text-muted mt-1">Artigos apresentados</p></div><div class="bg-white rounded-[22px] border border-slate-100 p-6"><p class="text-xs text-muted uppercase tracking-widest font-bold">No catálogo</p><p class="font-display text-4xl font-extrabold mt-3">{{$products->total()}}</p><p class="text-xs text-muted mt-1">Produtos registados</p></div><div class="bg-ink text-white rounded-[22px] p-6"><p class="text-xs text-flame uppercase tracking-widest font-bold">Gestão</p><p class="font-display text-xl font-extrabold mt-4">Tudo num só lugar.</p><p class="text-xs text-slate-400 mt-2">Cria, edita e organiza produtos.</p></div></div>
<div class="bg-white border border-slate-100 rounded-[26px] overflow-hidden"><div class="px-6 py-5 border-b border-slate-100"><h2 class="font-display font-extrabold text-xl">Inventário</h2></div>
<div class="divide-y divide-slate-100">
@forelse($products as $product)
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 sm:p-6">
<div class="flex items-center gap-4 min-w-0">
<div class="w-16 h-16 shrink-0 rounded-2xl bg-slate-100 overflow-hidden">@if($product->image_url)<img src="{{$product->image_url}}" alt="" class="w-full h-full object-cover">@else<div class="w-full h-full grid place-items-center text-slate-300 font-bold">N.</div>@endif</div>
<div class="min-w-0"><h3 class="font-display font-extrabold truncate">{{$product->name}}</h3><p class="text-xs text-muted mt-1">{{$product->category->name}} · {{$product->stock}} em stock</p><p class="text-sm font-extrabold mt-1">{{number_format($product->price,2,',','.')}} €</p></div></div>
<div class="flex gap-2 shrink-0"><a href="{{route('admin.produtos.edit',$product)}}" class="btn-light !py-2 !px-4 text-sm">Editar</a>
<form action="{{route('admin.produtos.destroy',$product)}}" method="post" onsubmit="return confirm('Tens a certeza de que queres eliminar este produto?')">@csrf @method('DELETE')<button type="submit" class="rounded-xl bg-red-50 text-red-700 px-4 py-2 text-sm font-bold hover:bg-red-100">Eliminar</button></form></div></div>
@empty<div class="p-10 text-muted text-center">Ainda não existem produtos.</div>@endforelse</div></div>
<div class="mt-7">{{$products->links()}}</div>
@endsection