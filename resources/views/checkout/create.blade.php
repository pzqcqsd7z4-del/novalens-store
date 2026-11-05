@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-3">Finalizar encomenda</h1><p class="mb-8 text-slate-500">Demonstração escolar: não haverá cobrança real.</p>
<form action="{{route('checkout.store')}}" method="post" class="max-w-xl bg-white border rounded-2xl p-7 space-y-5">@csrf
<label class="block">Nome completo<input class="w-full border rounded-xl p-3 mt-1" name="customer_name" required value="{{old('customer_name',auth()->user()->name)}}"></label>
<label class="block">Morada de entrega<textarea class="w-full border rounded-xl p-3 mt-1" name="address" rows="4" required>{{old('address')}}</textarea></label>
<button class="bg-slate-900 text-white px-6 py-3 rounded-xl">Confirmar encomenda</button></form>
@endsection
