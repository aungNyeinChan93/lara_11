<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
// use Illuminate\Container\Attributes\Auth;

Route::get("test", function () {
    dump("test");
    echo "<pre></pre>";
    echo "hello </br>";
    print('hell0');
});

Route::group(['prefix' => "test",'middleware'=>['auth']], function () {
    // Home
    Route::get("home",function(){
        return view('users.home');
    })->name('userHome');

    // customer
    Route::get("customers", [CustomerController::class, 'index'])->name('customers.index');
    Route::get("customers/{customer}", [CustomerController::class, 'show'])->name('customers.show');

    // users
    Route::get("users/{user}", [UserController::class, 'show'])->name("users.show");
    Route::get("users", [UserController::class, 'index'])->name("users.index");

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});


Route::prefix('custome')->middleware(["guest"])->group(function () {

    Route::get("register", [AuthController::class, 'registerPage'])->name('register');
    Route::post("register",[AuthController::class,'register'])->name('custome.register');


    Route::get('login',[AuthController::class,'loginPage'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('custome.login');

});
