@extends('layouts.app')
@section('content')
<a href="{{route('home')}}" class="text-cyan-700">← Voltar à loja</a>
<div class="grid md:grid-cols-2 gap-10 mt-8"><div class="rounded-3xl bg-white border min-h-80 flex items-center justify-center overflow-hidden">@if($product->image_url)<img class="w-full h-96 object-cover" src="{{$product->image_url}}" alt="{{$product->name}}">@else<span class="text-8xl text-slate-300">NL</span>@endif</div>
<div><p class="text-cyan-700 uppercase">{{$product->category->name}}</p><h1 class="text-4xl font-bold mt-3">{{$product->name}}</h1><p class="my-5 text-slate-600">{{$product->description}}</p><p class="text-3xl font-bold">{{number_format($product->price,2,',','.')}} €</p><p class="mt-4 mb-6">Stock: {{$product->stock}}</p>
@if($product->stock>0)<form method="post" action="{{route('cart.add',$product)}}" class="flex gap-3">@csrf<input type="number" min="1" max="{{$product->stock}}" name="quantity" value="1" class="w-20 p-3 border rounded-xl"><button class="px-6 py-3 rounded-xl bg-slate-900 text-white">Adicionar ao carrinho</button></form>@else<p>Indisponível</p>@endif</div></div>
@endsection
