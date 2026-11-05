<?php
namespace App\Http\Controllers;
use App\Models\{Product,Order};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class CheckoutController extends Controller {
 public function create(){return view('checkout.create');}
 public function orders(Request $r){return view('orders.index',['orders'=>Order::where('user_id',$r->user()->id)->latest()->with('items')->get()]);}
 public function store(Request $r){
  $data=$r->validate(['customer_name'=>'required|string|max:255','address'=>'required|string|min:8|max:2000']);
  $cart=session('cart',[]);if(!$cart)return redirect()->route('cart.index')->withErrors(['cart'=>'O carrinho está vazio.']);
  DB::transaction(function()use($r,$data,$cart){
   $products=Product::whereIn('id',array_keys($cart))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
   $total=0;$lines=[];
   foreach($cart as $id=>$qty){
    $p=$products->get($id);
    if(!$p||!is_int($qty)||$qty<1||$qty>$p->stock)throw ValidationException::withMessages(['cart'=>'O stock mudou. Revê o carrinho.']);
    $total+=(int)round(((float)$p->price)*100)*$qty;
    $lines[]=[$p,$qty];
   }
   $order=Order::create(['user_id'=>$r->user()->id,'customer_name'=>$data['customer_name'],'address'=>$data['address'],'total'=>$total/100,'status'=>'pendente']);
   foreach($lines as [$p,$qty]){$order->items()->create(['product_id'=>$p->id,'name'=>$p->name,'quantity'=>$qty,'unit_price'=>$p->price]);$p->decrement('stock',$qty);}
  });
  session()->forget('cart');return redirect()->route('orders.index')->with('success','Encomenda registada (sem pagamento real).');
 }
}
