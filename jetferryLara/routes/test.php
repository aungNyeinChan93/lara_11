<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
// use Illuminate\Container\Attributes\Auth;

Route::get("test/login", function () {
    return view('test.register');
});

Route::prefix('custome')->middleware(["guest"])->group(function () {

    Route::get("register", [AuthController::class, 'registerPage'])->name('register');
    Route::post("register",[AuthController::class,'register'])->name('custome.register');


    Route::get('login',[AuthController::class,'loginPage'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('custome.login');

});

Route::group(['prefix' => "test",'middleware'=>['auth']], function () {
    // Home
    Route::get("home",function(){
        $users = User::get();
        // dump($users);
        return view('users.home',compact('users'));
    })->name('userHome');

    // customer
    Route::get("customers", [CustomerController::class, 'index'])->name('customers.index');
    Route::get("customers/{customer}", [CustomerController::class, 'show'])->name('customers.show');

    // users
    Route::get("users/{user}", [UserController::class, 'show'])->name("users.show");
    Route::get("users", [UserController::class, 'index'])->name("users.index");

    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});


