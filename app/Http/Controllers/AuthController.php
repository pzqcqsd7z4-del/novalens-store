<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller {
 public function loginForm(){return view('auth.login');}
 public function registerForm(){return view('auth.register');}
 public function login(Request $r){
  $data=$r->validate(['email'=>'required|string|email|max:255','password'=>'required|string']);
  $email=mb_strtolower(trim($data['email']));
  $key='login:'.hash('sha256',$email.'|'.$r->ip());
  if(RateLimiter::tooManyAttempts($key,5)){
   throw ValidationException::withMessages(['email'=>'Demasiadas tentativas. Tenta novamente dentro de '.RateLimiter::availableIn($key).' segundos.']);
  }
  if(!Auth::attempt(['email'=>$email,'password'=>$data['password']])){
   RateLimiter::hit($key,300);
   return back()->withErrors(['email'=>'Email ou palavra-passe incorretos.'])->onlyInput('email');
  }
  RateLimiter::clear($key);
  $r->session()->regenerate();
  return redirect()->intended(route('home'));
 }
 public function register(Request $r){
  $r->merge(['email'=>mb_strtolower(trim((string)$r->input('email'))),'name'=>trim((string)$r->input('name'))]);
  $data=$r->validate([
   'name'=>'required|string|min:2|max:255',
   'email'=>'required|email|max:255|unique:users,email',
   'password'=>['required','confirmed',Password::min(10)->mixedCase()->numbers()->symbols()],
  ]);
  $user=User::create($data);
  Auth::login($user);
  $r->session()->regenerate();
  return redirect()->route('home')->with('success','A tua conta foi criada com sucesso.');
 }
 public function passwordForm(){return view('auth.password');}
 public function changePassword(Request $r){
  $data=$r->validate([
   'current_password'=>'required|current_password',
   'password'=>['required','confirmed',Password::min(10)->mixedCase()->numbers()->symbols()],
  ]);
  $r->user()->update(['password'=>$data['password']]);
  $r->session()->regenerate();
  return redirect()->route('password.edit')->with('success','Palavra-passe atualizada com sucesso.');
 }
 public function logout(Request $r){
  Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();
  return redirect()->route('home');
 }
}