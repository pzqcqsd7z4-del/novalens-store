<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RepairRequest extends Model {
 protected $fillable=['user_id','customer_name','email','phone','device_type','brand_model','service_type','description','status'];
 public function user(){return $this->belongsTo(User::class);}
}