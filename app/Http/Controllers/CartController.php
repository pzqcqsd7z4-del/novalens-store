<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller {
 public function index(){ $cart=session('cart',[]);$products=Product::whereIn('id',array_keys($cart))->get();return view('cart.index',compact('cart','products'));}
 public function add(Request $r,Product $product){
  $data=$r->validate(['quantity'=>'nullable|integer|min:1|max:100']);
  $cart=session('cart',[]);$id=(string)$product->id;$qty=($cart[$id]??0)+($data['quantity']??1);
  if($qty>$product->stock)return back()->withErrors(['stock'=>'Stock insuficiente.']);
  $cart[$id]=$qty;session(['cart'=>$cart]);return redirect()->route('cart.index')->with('success','Produto adicionado.');
 }
 public function update(Request $r,Product $product){
  $data=$r->validate(['quantity'=>'required|integer|min:1|max:100']);
  if($data['quantity']>$product->stock)return back()->withErrors(['stock'=>'Stock insuficiente.']);
  $cart=session('cart',[]);$cart[(string)$product->id]=$data['quantity'];session(['cart'=>$cart]);return back();
 }
 public function remove(Product $product){$cart=session('cart',[]);unset($cart[(string)$product->id]);session(['cart'=>$cart]);return back();}
}
