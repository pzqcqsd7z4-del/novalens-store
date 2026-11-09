<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
class AccountSecurityTest extends TestCase {
 use RefreshDatabase;
 public function test_weak_password_is_rejected():void{
  $this->post('/registar',['name'=>'Teste','email'=>'teste@example.com','password'=>'12345678','password_confirmation'=>'12345678'])
   ->assertSessionHasErrors('password');
  $this->assertDatabaseMissing('users',['email'=>'teste@example.com']);
 }
 public function test_registration_does_not_allow_admin_privileges():void{
  $this->post('/registar',['name'=>'Cliente','email'=>'cliente@example.com','password'=>'Password123!','password_confirmation'=>'Password123!','is_admin'=>true])->assertRedirect('/');
  $this->assertAuthenticated();
  $this->assertFalse((bool)User::where('email','cliente@example.com')->firstOrFail()->is_admin);
 }
 public function test_guest_cannot_modify_password():void{
  $this->put('/conta/seguranca',['current_password'=>'anything'])->assertRedirect('/entrar');
 }
 public function test_password_change_requires_current_password():void{
  $user=User::factory()->create(['password'=>'Password123!']);
  $this->actingAs($user)->put('/conta/seguranca',[
   'current_password'=>'wrong','password'=>'NewPassword123!','password_confirmation'=>'NewPassword123!',
  ])->assertSessionHasErrors('current_password');
  $this->assertTrue(Hash::check('Password123!',$user->fresh()->password));
 }
 public function test_customer_cannot_access_repair_admin():void{
  $this->actingAs(User::factory()->create())->get('/admin/reparacoes')->assertForbidden();
 }
}
