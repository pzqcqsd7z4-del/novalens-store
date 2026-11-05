@extends('layouts.app')
@section('content')
<div class="flex flex-wrap justify-between gap-3 items-center mb-8">
<h1 class="text-3xl font-bold">Gestão de encomendas</h1>
<a href="{{route('admin.produtos.index')}}" class="text-cyan-700">Gerir produtos</a>
</div>
@forelse($orders as $order)
<article class="bg-white border rounded-2xl p-6 mb-4">
<div class="flex flex-wrap justify-between gap-4">
<div><h2 class="font-bold text-xl">Encomenda #{{$order->id}}</h2><p class="text-sm text-slate-500 mt-1">{{$order->created_at->format('d/m/Y H:i')}} · {{$order->customer_name}} · {{$order->user?->email}}</p><p class="text-sm mt-2">{{$order->address}}</p></div>
<p class="font-bold text-xl">{{number_format($order->total,2,',','.')}} €</p>
</div>
<ul class="list-disc pl-5 my-4 text-sm text-slate-700">
@foreach($order->items as $item)<li>{{$item->name}} — {{$item->quantity}} unidade(s)</li>@endforeach
</ul>
<form method="post" action="{{route('admin.orders.update',$order)}}" class="flex flex-wrap items-center gap-3">
@csrf @method('PATCH')
<label for="status-{{$order->id}}" class="text-sm font-medium">Estado</label>
<select id="status-{{$order->id}}" name="status" class="border rounded-lg p-2">
@foreach(['pendente'=>'Pendente','em_preparacao'=>'Em preparação','enviada'=>'Enviada','concluida'=>'Concluída','cancelada'=>'Cancelada'] as $value=>$label)<option value="{{$value}}" @selected($order->status===$value)>{{$label}}</option>@endforeach
</select>
<button class="rounded-lg bg-slate-900 px-4 py-2 text-white">Guardar</button>
</form>
</article>
@empty<p>Sem encomendas registadas.</p>@endforelse
{{$orders->links()}}
@endsection
