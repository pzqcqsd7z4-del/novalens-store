<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller {
 public function loginForm(){return view('auth.login');}
 public function registerForm(){return view('auth.register');}
 public function login(Request $r){
  $data=$r->validate(['email'=>'required|email','password'=>'required|string']);
  $key='login:'.mb_strtolower($data['email']).'|'.$r->ip();
  if(RateLimiter::tooManyAttempts($key,5)){
   throw ValidationException::withMessages(['email'=>'Demasiadas tentativas. Tenta novamente dentro de '.RateLimiter::availableIn($key).' segundos.']);
  }
  if(!Auth::attempt($data)){
   RateLimiter::hit($key,60);
   return back()->withErrors(['email'=>'Credenciais inválidas.'])->onlyInput('email');
  }
  RateLimiter::clear($key);
  $r->session()->regenerate();
  return redirect()->intended(route('home'));
 }
 public function register(Request $r){
  $data=$r->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email','password'=>['required','confirmed',Password::min(8)]]);
  $u=User::create($data);Auth::login($u);$r->session()->regenerate();
  return redirect()->route('home');
 }
 public function logout(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('home');}
}
