<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Tester;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JobPositionController;
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
        return view('users.home',compact('users'));
    })->name('userHome');

    // customer
    Route::get("customers", [CustomerController::class, 'index'])->name('customers.index');
    Route::get("customers/{customer}", [CustomerController::class, 'show'])->name('customers.show');

    // users
    Route::get("users/{user}", [UserController::class, 'show'])->name("users.show");
    Route::get("users", [UserController::class, 'index'])->name("users.index");

    // logout
    Route::post('logout',[AuthController::class,'logout'])->name('logout');


    // jobPosition
    Route::prefix('jobPosition')->group(function(){
        Route::get('home',[JobPositionController::class,'home'])->name('jobPosition.home');
        Route::get('home/{id}',[JobPositionController::class,'show'])->name('jobPosition.show');
        Route::get('create',[JobPositionController::class,'createPage'])->name("jobPosition.createPage");
        Route::post('create',[JobPositionController::class,'create'])->name("jobPosition.create");
        Route::delete('delete/{id}',[JobPositionController::class,'destroy'])->name("jobPosition.destroy");
    });

    // posts
    Route::get("posts",[PostController::class,'index'])->name('posts.index');
    Route::get("posts/{post}",[PostController::class,'show'])->name('posts.show');


});



// testing routes
Route::get("all",function(){

    dd(Tester::all()->toArray());

});

// admin acc create
Route::get("admins/create/{amount?}",function(int $amount = null){
    $admins = User::factory($amount)->admin()->create();
    dd($admins);
});


