@extends('layouts.app')
@section('title','Reparações e assistência — NovaLens Store')
@section('content')
<section class="rounded-[32px] bg-ink text-white p-8 md:p-14 relative overflow-hidden">
 <div class="absolute -right-24 -top-24 w-80 h-80 rounded-full bg-danger/40 blur-3xl"></div>
 <div class="relative z-10 max-w-3xl"><span class="text-flame text-xs font-extrabold tracking-[.2em] uppercase">NovaLens Tech Repair</span>
 <h1 class="font-display text-4xl sm:text-6xl font-extrabold tracking-tight leading-tight mt-5">O teu equipamento merece <span class="text-flame">uma segunda vida.</span></h1>
 <p class="text-slate-300 mt-5 text-lg leading-8">Troca de ecrãs, baterias, portas de carregamento e diagnóstico técnico. Solicita um orçamento sem compromisso.</p>
 <a href="#pedido" class="inline-flex bg-flame text-ink font-extrabold rounded-xl px-6 py-4 mt-7 hover:bg-orange-300">Pedir orçamento →</a></div>
</section>
<section class="py-12"><div class="mb-7"><p class="text-danger uppercase tracking-widest text-xs font-extrabold">O que fazemos</p><h2 class="font-display text-3xl font-extrabold mt-2">Assistência técnica</h2></div>
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
@foreach([['01','Troca de ecrã','Ecrãs partidos, vidro danificado e falhas no toque.'],['02','Troca de bateria','Baterias degradadas ou com pouca autonomia.'],['03','Carregamento','Verificação de portas e problemas de carregamento.'],['04','Diagnóstico','Análise de avarias em telemóveis, tablets e computadores.']] as $service)
<div class="bg-white border border-slate-100 rounded-[24px] p-6"><span class="text-danger font-display font-extrabold text-sm">{{$service[0]}}</span><h3 class="font-display font-extrabold text-xl mt-8">{{$service[1]}}</h3><p class="text-muted text-sm mt-3 leading-6">{{$service[2]}}</p></div>
@endforeach
</div></section>
<section id="pedido" class="scroll-mt-28 grid lg:grid-cols-[1fr_340px] gap-6 items-start">
<div class="bg-white rounded-[28px] border border-slate-100 p-6 sm:p-9">
<p class="text-danger uppercase tracking-widest font-extrabold text-xs">Pedido de orçamento</p><h2 class="font-display font-extrabold text-3xl mt-3">Conta-nos o que aconteceu.</h2><p class="text-muted text-sm mt-3 mb-8">Preenche os dados para registar um pedido demonstrativo. O orçamento final depende do diagnóstico.</p>
<form action="{{route('repairs.store')}}" method="post" class="grid sm:grid-cols-2 gap-5">@csrf
<label class="block text-sm font-bold">Nome completo<input class="field mt-2" type="text" name="customer_name" maxlength="150" required value="{{old('customer_name',auth()->user()?->name)}}"></label>
<label class="block text-sm font-bold">Email<input class="field mt-2" type="email" name="email" maxlength="180" required value="{{old('email',auth()->user()?->email)}}"></label>
<label class="block text-sm font-bold">Telefone<input class="field mt-2" type="tel" name="phone" maxlength="35" required value="{{old('phone')}}" placeholder="9XXXXXXXX"></label>
<label class="block text-sm font-bold">Tipo de equipamento<select class="field mt-2" name="device_type" required><option value="">Escolher...</option>@foreach(['smartphone'=>'Smartphone','tablet'=>'Tablet','portatil'=>'Portátil','consola'=>'Consola','outro'=>'Outro'] as $value=>$label)<option value="{{$value}}" @selected(old('device_type')===$value)>{{$label}}</option>@endforeach</select></label>
<label class="block text-sm font-bold sm:col-span-2">Marca e modelo<input class="field mt-2" type="text" name="brand_model" required maxlength="150" value="{{old('brand_model')}}" placeholder="Ex.: Samsung Galaxy S22"></label>
<label class="block text-sm font-bold sm:col-span-2">Serviço pretendido<select class="field mt-2" name="service_type" required><option value="">Escolher...</option>@foreach(['ecra'=>'Troca de ecrã','bateria'=>'Troca de bateria','carregamento'=>'Problema de carregamento','diagnostico'=>'Diagnóstico','outro'=>'Outro'] as $value=>$label)<option value="{{$value}}" @selected(old('service_type')===$value)>{{$label}}</option>@endforeach</select></label>
<label class="block text-sm font-bold sm:col-span-2">Descrição do problema<textarea class="field mt-2" name="description" rows="5" minlength="10" maxlength="2000" required placeholder="Conta-nos o problema, quando começou e o que já tentaste...">{{old('description')}}</textarea></label>
<div class="sm:col-span-2"><button class="btn-dark w-full">Enviar pedido de orçamento →</button><p class="text-xs text-muted mt-3 leading-5">Demonstração escolar: o envio apenas guarda o pedido nesta aplicação. Não implica assistência real ou contacto garantido.</p></div>
</form></div>
<aside class="bg-orange-50 rounded-[26px] p-7 border border-orange-100"><span class="text-danger text-xs uppercase font-extrabold tracking-widest">Como funciona</span><ol class="mt-6 space-y-6">@foreach([['1','Descreves a avaria'],['2','O pedido fica registado'],['3','A equipa simula a análise'],['4','Recebes um orçamento fora deste protótipo']] as $step)<li class="flex gap-3 items-start"><span class="w-8 h-8 shrink-0 bg-ink text-white font-extrabold rounded-full grid place-items-center">{{$step[0]}}</span><span class="text-sm font-semibold pt-1">{{$step[1]}}</span></li>@endforeach</ol><p class="text-xs text-muted mt-7 leading-5">Não são apresentados preços fixos, pois variam conforme o modelo e a avaria.</p></aside>
</section>
@endsection