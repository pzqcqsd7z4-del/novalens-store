<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RepairRequest;
class AdminRepairController extends Controller {
 public function index(){return view('admin.repairs',['repairs'=>RepairRequest::latest()->paginate(15)]);}
 public function update(Request $request, RepairRequest $repair){
  $data=$request->validate(['status'=>['required',Rule::in(['recebido','em_analise','orcamento_enviado','em_reparacao','concluido','cancelado'])]]);
  $repair->update($data);
  return back()->with('success','Estado do pedido atualizado.');
 }
}