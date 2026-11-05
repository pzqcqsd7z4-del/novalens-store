@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-8">As minhas encomendas</h1>
@forelse($orders as $order)<div class="border bg-white p-6 rounded-xl mb-4"><h2 class="font-bold">Encomenda #{{$order->id}} — {{number_format($order->total,2,',','.')}} €</h2><p class="text-sm text-slate-500">{{$order->created_at->format('d/m/Y H:i')}} · {{$order->status}}</p><ul class="mt-3 list-disc pl-5">@foreach($order->items as $item)<li>{{$item->name}} — {{$item->quantity}} × {{number_format($item->unit_price,2,',','.')}} €</li>@endforeach</ul></div>
@empty<p>Ainda não tens encomendas.</p>@endforelse
@endsection
