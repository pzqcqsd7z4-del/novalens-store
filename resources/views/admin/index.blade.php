@extends('layouts.app')
@section('content')
<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
<h1 class="text-3xl font-bold">Gestão de produtos</h1>
<div class="flex flex-wrap items-center gap-4">
<a href="{{route('admin.orders.index')}}" class="text-cyan-700">Ver encomendas</a>
<a href="{{route('admin.produtos.create')}}" class="bg-cyan-600 text-white px-5 py-3 rounded-xl">Novo produto</a>
</div></div>
@foreach($products as $product)<div class="bg-white rounded-xl border p-4 mb-3 flex justify-between items-center gap-4">
<div><strong>{{$product->name}}</strong><p class="text-sm">{{$product->category->name}} · {{number_format($product->price,2,',','.')}} € · Stock: {{$product->stock}}</p></div>
<div class="flex items-center gap-3"><a class="text-cyan-700" href="{{route('admin.produtos.edit',$product)}}">Editar</a>
<form method="post" action="{{route('admin.produtos.destroy',$product)}}">@csrf @method('DELETE')<button class="text-red-600" onclick="return confirm('Eliminar produto?')">Eliminar</button></form></div></div>@endforeach
{{$products->links()}}
@endsection
