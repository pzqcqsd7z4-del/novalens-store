@extends('layouts.app')
@section('content')
<section class="bg-slate-900 rounded-3xl p-8 md:p-14 text-white mb-10"><p class="uppercase tracking-widest text-cyan-300 text-sm">Capas · Acessórios · Câmaras</p><h1 class="text-4xl md:text-6xl font-extrabold mt-4">Tudo para proteger, criar e captar.</h1><p class="text-slate-300 mt-4">Descobre a coleção NovaLens.</p></section>
<form method="get" class="flex flex-wrap gap-3 mb-8">
<input name="q" value="{{request('q')}}" placeholder="Pesquisar produtos..." class="flex-1 min-w-48 border rounded-xl p-3">
<select name="categoria" class="border rounded-xl p-3"><option value="">Todas as categorias</option>@foreach($categories as $category)<option value="{{$category->slug}}" @selected(request('categoria')===$category->slug)>{{$category->name}}</option>@endforeach</select>
<button class="bg-cyan-600 text-white px-6 py-3 rounded-xl">Pesquisar</button></form>
<div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
@forelse($products as $product)<article class="bg-white rounded-2xl shadow-sm overflow-hidden border"><a href="{{route('products.show',$product)}}" class="block">
<div class="h-52 bg-slate-100 flex items-center justify-center overflow-hidden">@if($product->image_url)<img src="{{$product->image_url}}" alt="{{$product->name}}" class="h-full w-full object-cover">@else <span class="text-5xl text-slate-300">NL</span>@endif</div>
<div class="p-5"><p class="text-xs uppercase text-cyan-700">{{$product->category->name}}</p><h2 class="font-semibold text-lg mt-1">{{$product->name}}</h2><p class="font-bold text-2xl mt-3">{{number_format($product->price,2,',','.')}} €</p><p class="text-sm text-slate-500 mt-1">Stock: {{$product->stock}}</p></div></a></article>
@empty <p>Não foram encontrados produtos.</p>@endforelse</div><div class="mt-8">{{$products->links()}}</div>
@endsection
