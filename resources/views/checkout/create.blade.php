@extends('layouts.app')
@section('title','Finalizar encomenda — NovaLens Store')
@section('content')
<div class="mb-9"><p class="text-xs uppercase tracking-[.2em] font-extrabold text-forest mb-2">Quase terminado</p><h1 class="font-display text-4xl md:text-5xl tracking-[-.05em] font-extrabold">Finalizar encomenda<span class="text-forest">.</span></h1><p class="text-muted mt-3">Só faltam os dados de entrega para concluir a simulação.</p></div>
<div class="grid lg:grid-cols-[minmax(0,1fr)_340px] gap-7 items-start">
 <form method="post" action="{{route('checkout.store')}}" class="bg-white rounded-[26px] border border-slate-100 p-7 md:p-9 space-y-6">@csrf
  <div><p class="text-forest uppercase tracking-widest text-xs font-extrabold">01 · Informação pessoal</p><h2 class="font-display text-2xl font-extrabold mt-2">Dados de entrega</h2></div>
  <label class="block text-sm font-bold" for="customer_name">Nome completo<input id="customer_name" name="customer_name" value="{{old('customer_name',auth()->user()->name)}}" required maxlength="255" autocomplete="name" class="field mt-2" placeholder="O teu nome"></label>
  <label class="block text-sm font-bold" for="address">Morada de entrega<textarea id="address" name="address" required minlength="8" maxlength="2000" autocomplete="street-address" rows="5" class="field mt-2" placeholder="Rua, número, código postal e localidade">{{old('address')}}</textarea></label>
  <div class="bg-emerald-50 rounded-2xl p-5"><p class="font-extrabold text-forest text-sm">Compra de demonstração</p><p class="text-xs text-slate-600 leading-6 mt-2">O pedido ficará registado na base de dados da aplicação, mas não será enviado ou cobrado.</p></div>
  <button type="submit" class="btn-dark w-full">Confirmar encomenda →</button>
 </form>
 <aside class="bg-ink text-white rounded-[26px] p-7"><span class="uppercase tracking-widest text-xs font-bold text-mint">02 · Revisão</span><h2 class="font-display font-extrabold text-2xl mt-3">Tudo pronto?</h2><p class="text-slate-300 text-sm mt-4 leading-7">Revê os artigos e quantidades no teu carrinho antes de concluir.</p><a href="{{route('cart.index')}}" class="inline-flex text-mint text-sm font-extrabold mt-6 hover:underline">← Rever carrinho</a></aside>
</div>
@endsection