<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RepairRequest;
class RepairController extends Controller {
 public function index(){return view('repairs.index');}
 public function store(Request $request){
  $data=$request->validate([
   'customer_name'=>'required|string|max:150',
   'email'=>'required|email|max:180',
   'phone'=>['required','string','max:35','regex:/^[0-9+()\s-]{7,35}$/'],
   'device_type'=>['required',Rule::in(['smartphone','tablet','portatil','consola','outro'])],
   'brand_model'=>'required|string|max:150',
   'service_type'=>['required',Rule::in(['ecra','bateria','carregamento','diagnostico','outro'])],
   'description'=>'required|string|min:10|max:2000',
  ]);
  $data['user_id']=$request->user()?->id;
  RepairRequest::create($data);
  return redirect()->route('repairs.index')->with('success','Pedido de orçamento registado! Será analisado nesta demonstração.');
 }
}