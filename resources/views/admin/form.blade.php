@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-8">{{$product->exists?'Editar':'Adicionar'}} produto</h1>
<form class="max-w-xl bg-white border rounded-2xl p-7 space-y-4" method="post" action="{{$product->exists?route('admin.produtos.update',$product):route('admin.produtos.store')}}">@csrf @if($product->exists) @method('PUT') @endif
<label class="block">Nome<input class="w-full border rounded-xl p-3 mt-1" name="name" required value="{{old('name',$product->name)}}"></label>
<label class="block">Categoria<select class="w-full border rounded-xl p-3 mt-1" name="category_id">@foreach($categories as $category)<option value="{{$category->id}}" @selected(old('category_id',$product->category_id)==$category->id)>{{$category->name}}</option>@endforeach</select></label>
<label class="block">Descrição<textarea class="w-full border rounded-xl p-3 mt-1" name="description" rows="4">{{old('description',$product->description)}}</textarea></label>
<label class="block">Preço (€)<input type="number" min="0" step="0.01" class="w-full border rounded-xl p-3 mt-1" name="price" required value="{{old('price',$product->price)}}"></label>
<label class="block">Stock<input type="number" min="0" class="w-full border rounded-xl p-3 mt-1" name="stock" required value="{{old('stock',$product->stock??0)}}"></label>
<label class="block">URL da imagem (opcional)<input type="url" class="w-full border rounded-xl p-3 mt-1" name="image_url" value="{{old('image_url',$product->image_url)}}"></label>
<button class="bg-slate-900 text-white px-6 py-3 rounded-xl">Guardar produto</button></form>
@endsection
