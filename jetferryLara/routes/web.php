<?php

require __DIR__.'/auth.php';
require __DIR__.'/test.php';


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// oauth
Route::get('/auth/{provider}/redirect', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('redirect.auth');

Route::get('/auth/{provider}/callback', function ($provider) {
    $user = Socialite::driver($provider)->user();

    $user = User::updateOrCreate([
        'provider_id' =>$user->id,
    ], [
        'name' =>$user->name,
        'nickname' =>$user->nickname,
        'email' =>$user->email,
        'provider' =>$provider,
        'provider_token' =>$user->token,
    ]);

    Auth::login($user);

    return to_route("userHome");
});




