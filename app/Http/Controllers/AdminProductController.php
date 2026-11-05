<?php
namespace App\Http\Controllers;
use App\Models\{Product,Category};
use Illuminate\Http\Request;
class AdminProductController extends Controller {
 public function index(){return view('admin.index',['products'=>Product::with('category')->latest()->paginate(15)]);}
 public function create(){return view('admin.form',['product'=>new Product,'categories'=>Category::all()]);}
 public function edit(Product $product){return view('admin.form',['product'=>$product,'categories'=>Category::all()]);}
 private function data(Request $r):array{
  return $r->validate([
   'name'=>'required|string|max:255',
   'category_id'=>'required|exists:categories,id',
   'description'=>'nullable|string|max:3000',
   'price'=>'required|numeric|min:0|max:999999',
   'stock'=>'required|integer|min:0',
   'image_url'=>['nullable','string','max:2048','regex:~^(https?://[^\s]+|/images/[a-zA-Z0-9._/-]+)$~i']
  ]);
 }
 public function store(Request $r){Product::create($this->data($r));return redirect()->route('admin.produtos.index')->with('success','Produto criado.');}
 public function update(Request $r,Product $product){$product->update($this->data($r));return redirect()->route('admin.produtos.index')->with('success','Produto atualizado.');}
 public function destroy(Product $product){$product->delete();return back()->with('success','Produto eliminado.');}
}
