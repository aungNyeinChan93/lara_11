<?php

use App\Mail\Test;
use App\Models\User;
use App\Jobs\TestJob;
use App\Models\Tester;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\UserSettingController;
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


    // user setting
    Route::get("users/setting",[UserSettingController::class,'index'])->name('userSetting.index');
    Route::get("users/setting/change",[UserSettingController::class,'change'])->name('userSetting.change');
    Route::post("users/setting/update",[UserSettingController::class,'update'])->name('userSetting.update');


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
        Route::get('edit/{id}',[JobPositionController::class,'edit'])->name("jobPosition.edit");
        Route::put('update/{id}',[JobPositionController::class,'update'])->name("jobPosition.update");
        Route::delete('delete/{id}',[JobPositionController::class,'destroy'])->name("jobPosition.destroy");
    });

    // posts
    Route::get("posts",[PostController::class,'index'])->name('posts.index');
    Route::get("posts/{post}",[PostController::class,'show'])->name('posts.show');

    // Language
    Route::resource("languages",LanguageController::class);

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

// gate test
Route::get('gate',function(){
    dd('WELCOME CHAN!!!');
})->can('chan',null);


// mail test

Route::get("test/mail",function(){
    Mail::to(Auth::user()->email)->send(new Test());

    dd('success test mail');
});

// queue test
Route::get('test/queue',function(){ //need to run worker
    dump("start..");
    dispatch(function(){
        logger("queue test!!!");
    })->delay(5);
    dump("end!");
});


// custome job
Route::get('test/customeJob',function(){ // note - everything changed restart the worker!
    $user = User::first();
    TestJob::dispatch($user);
    dump("hit");
});
