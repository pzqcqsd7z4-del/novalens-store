<?php
namespace App\Http\Controllers;
use App\Models\{Product,Category};
use Illuminate\Http\Request;
class StoreController extends Controller {
 public function index(Request $r){
  $products=Product::with('category')->when($r->filled('q'),fn($q)=>$q->where('name','like','%'.$r->query('q').'%'))
   ->when($r->filled('categoria'),fn($q)=>$q->whereHas('category',fn($c)=>$c->where('slug',$r->query('categoria'))))
   ->latest()->paginate(9)->withQueryString();
  return view('store.index',['products'=>$products,'categories'=>Category::all()]);
 }
 public function show(Product $product){return view('store.show',compact('product'));}
}
