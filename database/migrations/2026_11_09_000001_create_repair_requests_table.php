<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void { Schema::create('repair_requests',function(Blueprint $t){
  $t->id();$t->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
  $t->string('customer_name');$t->string('email');$t->string('phone',35);
  $t->string('device_type',60);$t->string('brand_model');
  $t->string('service_type',70);$t->text('description');
  $t->string('status',25)->default('recebido');$t->timestamps();
 });}
 public function down():void {Schema::dropIfExists('repair_requests');}
};