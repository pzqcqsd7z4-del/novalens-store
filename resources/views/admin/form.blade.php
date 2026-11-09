@extends('layouts.app')
@section('title',($product->exists?'Editar':'Novo').' produto — NovaLens Admin')
@section('content')
<nav class="text-sm text-muted mb-7"><a href="{{route('admin.produtos.index')}}" class="hover:text-flame">Administração</a><span class="mx-2">/</span><span class="text-ink font-bold">{{$product->exists?'Editar produto':'Novo produto'}}</span></nav>
<div class="max-w-3xl"><p class="text-xs uppercase tracking-[.2em] font-extrabold text-danger mb-2">Gestão de catálogo</p><h1 class="font-display text-4xl md:text-5xl tracking-[-.05em] font-extrabold">{{$product->exists?'Editar produto':'Adicionar produto'}}<span class="text-danger">.</span></h1><p class="text-muted mt-3 mb-8">Preenche os detalhes para manteres a loja organizada.</p>
<form method="post" action="{{$product->exists?route('admin.produtos.update',$product):route('admin.produtos.store')}}" class="bg-white border border-slate-100 rounded-[26px] p-6 sm:p-9 space-y-6">@csrf @if($product->exists) @method('PUT') @endif
<div class="grid sm:grid-cols-2 gap-5">
<label class="block text-sm font-bold sm:col-span-2" for="name">Nome do produto<input id="name" name="name" required maxlength="255" value="{{old('name',$product->name)}}" class="field mt-2" placeholder="Ex.: Câmara compacta digital"></label>
<label class="block text-sm font-bold sm:col-span-2" for="category_id">Categoria<select id="category_id" name="category_id" required class="field mt-2">@foreach($categories as $category)<option value="{{$category->id}}" @selected(old('category_id',$product->category_id)==$category->id)>{{$category->name}}</option>@endforeach</select></label>
<label class="block text-sm font-bold sm:col-span-2" for="description">Descrição<textarea id="description" name="description" rows="4" maxlength="3000" class="field mt-2" placeholder="Descreve o produto e as suas características">{{old('description',$product->description)}}</textarea></label>
<label class="block text-sm font-bold" for="price">Preço (€)<input id="price" type="number" min="0" max="999999" step="0.01" name="price" required value="{{old('price',$product->price)}}" class="field mt-2"></label>
<label class="block text-sm font-bold" for="stock">Stock disponível<input id="stock" type="number" min="0" step="1" name="stock" required value="{{old('stock',$product->stock??0)}}" class="field mt-2"></label>
<label class="block text-sm font-bold sm:col-span-2" for="image_url">Imagem (URL ou caminho /images/...)<input id="image_url" name="image_url" value="{{old('image_url',$product->image_url)}}" class="field mt-2" placeholder="/images/camaras.svg"></label>
</div>
<div class="border-t border-slate-100 pt-6 flex flex-wrap items-center justify-between gap-3"><a href="{{route('admin.produtos.index')}}" class="btn-light">Cancelar</a><button class="btn-dark min-w-44" type="submit">Guardar produto →</button></div>
</form></div>
@endsection