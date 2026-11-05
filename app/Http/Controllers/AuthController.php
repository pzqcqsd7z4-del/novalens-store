<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
class AuthController extends Controller {
 public function loginForm(){return view('auth.login');}
 public function registerForm(){return view('auth.register');}
 public function login(Request $r){
  $data=$r->validate(['email'=>'required|email','password'=>'required|string']);
  if(!Auth::attempt($data))return back()->withErrors(['email'=>'Credenciais inválidas.'])->onlyInput('email');
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
