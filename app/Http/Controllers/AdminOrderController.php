<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
class AdminOrderController extends Controller {
 public function index(){
  return view('admin.orders',[
   'orders'=>Order::with(['user','items'])->latest()->paginate(15)
  ]);
 }
 public function update(Request $request,Order $order){
  $data=$request->validate(['status'=>'required|in:pendente,em_preparacao,enviada,concluida,cancelada']);
  $order->update($data);
  return back()->with('success','Estado da encomenda atualizado.');
 }
}
