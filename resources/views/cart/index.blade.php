@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-8">Carrinho</h1>
@php($total=0)
@forelse($products as $product)
@php($quantity=$cart[(string)$product->id]??0)
@php($total+=(float)$product->price*$quantity)
<div class="bg-white border rounded-xl p-5 mb-3 flex flex-wrap justify-between gap-4 items-center"><div><h2 class="font-semibold">{{$product->name}}</h2><p>{{number_format($product->price,2,',','.')}} € / unidade</p></div>
<form method="post" action="{{route('cart.update',$product)}}" class="flex gap-2 items-center">@csrf @method('PATCH')<input type="number" name="quantity" value="{{$quantity}}" min="1" max="{{$product->stock}}" class="w-20 border p-2 rounded"><button class="px-3 py-2 bg-slate-200 rounded">Atualizar</button></form>
<form method="post" action="{{route('cart.remove',$product)}}">@csrf @method('DELETE')<button class="text-red-600">Remover</button></form></div>
@empty<p>O teu carrinho está vazio.</p>@endforelse
@if($products->count())<p class="text-2xl font-bold mt-8">Total: {{number_format($total,2,',','.')}} €</p><a href="{{route('checkout.create')}}" class="inline-block mt-5 bg-cyan-600 text-white px-6 py-3 rounded-xl">Finalizar encomenda</a>@endif
@endsection
