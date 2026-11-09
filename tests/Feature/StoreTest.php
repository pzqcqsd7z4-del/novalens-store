<?php
namespace Tests\Feature;
use App\Models\{Product,Category,User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class StoreTest extends TestCase {
 use RefreshDatabase;
 public function test_homepage_loads():void {$this->get('/')->assertOk();}
 public function test_customer_registers_without_admin_rights():void {
  $this->post('/registar',['name'=>'Cliente','email'=>'cliente@example.com','password'=>'Password123!','password_confirmation'=>'Password123!'])->assertRedirect('/');
  $this->assertAuthenticated();$this->assertFalse((bool)User::firstOrFail()->is_admin);
 }
 public function test_customer_cannot_access_admin():void {
  $this->actingAs(User::factory()->create())->get('/admin/produtos')->assertForbidden();
 }
 public function test_checkout_requires_login():void {$this->get('/checkout')->assertRedirect('/entrar');}
 public function test_checkout_stores_order_and_reduces_stock():void {
  $category=Category::create(['name'=>'Capas','slug'=>'capas']);
  $product=Product::create(['category_id'=>$category->id,'name'=>'Capa teste','price'=>15.00,'stock'=>5]);
  $user=User::factory()->create();
  $this->actingAs($user)->withSession(['cart'=>[(string)$product->id=>2]])->post('/checkout',[
   'customer_name'=>'Cliente Teste','address'=>'Rua de Exemplo número 10, Porto',
  ])->assertRedirect('/encomendas');
  $this->assertDatabaseHas('orders',['user_id'=>$user->id,'total'=>30.00]);
  $this->assertDatabaseHas('products',['id'=>$product->id,'stock'=>3]);
 }
}
