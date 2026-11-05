<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void{Schema::create('orders',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained();$t->string('customer_name');$t->text('address');$t->decimal('total',10,2);$t->string('status')->default('pendente');$t->timestamps();});}
 public function down():void{Schema::dropIfExists('orders');}
};
