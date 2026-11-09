@extends('layouts.app')
@section('title','Gerir encomendas — NovaLens Admin')
@section('content')
<div class="flex flex-wrap justify-between items-end gap-5 mb-9"><div><p class="text-xs uppercase tracking-[.2em] font-extrabold text-forest mb-2">Painel de administração</p><h1 class="font-display text-4xl md:text-5xl tracking-[-.05em] font-extrabold">Encomendas<span class="text-forest">.</span></h1><p class="text-muted mt-3">Consulta os pedidos e atualiza o seu estado.</p></div><a href="{{route('admin.produtos.index')}}" class="btn-light">← Gestão de produtos</a></div>
<div class="space-y-5">
@forelse($orders as $order)
<article class="rounded-[26px] bg-white border border-slate-100 overflow-hidden">
<div class="p-6 sm:p-8 border-b border-slate-100 flex flex-wrap justify-between gap-4"><div><p class="text-forest text-xs font-extrabold uppercase tracking-widest">Pedido #{{$order->id}}</p><h2 class="font-display font-extrabold text-xl mt-2">{{$order->customer_name}}</h2><p class="text-xs text-muted mt-2">{{$order->created_at->format('d/m/Y · H:i')}} · {{$order->user?->email}}</p></div><div><span class="inline-flex rounded-full bg-emerald-50 text-forest px-4 py-2 text-xs font-extrabold">{{str_replace('_',' ',$order->status)}}</span><p class="font-display font-extrabold text-2xl mt-3">{{number_format($order->total,2,',','.')}} €</p></div></div>
<div class="p-6 sm:p-8 grid md:grid-cols-2 gap-7">
<div><p class="text-xs text-muted uppercase tracking-widest font-bold mb-3">Artigos</p><ul class="space-y-2">@foreach($order->items as $item)<li class="text-sm flex gap-3 justify-between"><span>{{$item->name}}</span><span class="font-bold whitespace-nowrap">{{$item->quantity}} × {{number_format($item->unit_price,2,',','.')}} €</span></li>@endforeach</ul><p class="text-xs text-muted uppercase tracking-widest font-bold mt-6 mb-2">Morada</p><p class="text-sm whitespace-pre-line">{{$order->address}}</p></div>
<form action="{{route('admin.orders.update',$order)}}" method="post" class="bg-slate-50 rounded-2xl p-5 self-start">@csrf @method('PATCH')
<label class="font-bold text-sm block" for="status-{{$order->id}}">Alterar estado da encomenda</label>
<select id="status-{{$order->id}}" name="status" class="field mt-3">
@foreach(['pendente'=>'Pendente','em_preparacao'=>'Em preparação','enviada'=>'Enviada','concluida'=>'Concluída','cancelada'=>'Cancelada'] as $value=>$label)<option value="{{$value}}" @selected($order->status===$value)>{{$label}}</option>@endforeach
</select><button type="submit" class="btn-dark mt-4 w-full">Guardar estado →</button></form></div>
</article>
@empty<div class="bg-white rounded-[26px] p-14 text-center"><h2 class="font-display text-2xl font-extrabold">Ainda sem encomendas.</h2><p class="text-muted mt-3">Assim que existirem pedidos, aparecem aqui.</p></div>
@endforelse</div><div class="mt-7">{{$orders->links()}}</div>
@endsection