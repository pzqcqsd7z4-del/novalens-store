<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{StoreController,AuthController,CartController,CheckoutController,AdminProductController};
Route::get('/',[StoreController::class,'index'])->name('home');
Route::get('/produtos/{product}',[StoreController::class,'show'])->name('products.show');
Route::get('/entrar',[AuthController::class,'loginForm'])->name('login');
Route::post('/entrar',[AuthController::class,'login'])->name('login.store');
Route::get('/registar',[AuthController::class,'registerForm'])->name('register');
Route::post('/registar',[AuthController::class,'register'])->name('register.store');
Route::post('/sair',[AuthController::class,'logout'])->name('logout');
Route::get('/carrinho',[CartController::class,'index'])->name('cart.index');
Route::post('/carrinho/{product}',[CartController::class,'add'])->name('cart.add');
Route::patch('/carrinho/{product}',[CartController::class,'update'])->name('cart.update');
Route::delete('/carrinho/{product}',[CartController::class,'remove'])->name('cart.remove');
Route::middleware('auth')->group(function(){
  Route::get('/checkout',[CheckoutController::class,'create'])->name('checkout.create');
  Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
  Route::get('/encomendas',[CheckoutController::class,'orders'])->name('orders.index');
});
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function(){
  Route::resource('produtos',AdminProductController::class)->except(['show'])->parameters(['produtos'=>'product']);
});
