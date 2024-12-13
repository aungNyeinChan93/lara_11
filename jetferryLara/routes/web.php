<?php

require __DIR__."/test.php";

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


