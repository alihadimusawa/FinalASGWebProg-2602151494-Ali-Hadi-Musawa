<?php

use App\Http\Controllers\pageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('register');
});

Route::get("/register", function(){
    return view("register");
});
Route::post('/register-user', [UserController::class, 'store']);

Route::get("/register-payment/{userId}", function($userId){
    return view("register-payment", ['userId' => $userId]);
})->name("register-payment");
Route::post("/register-payment", [UserController::class, 'updateCoin']);

Route::get('/login', function(){
    return view("login");
})->name("login");
Route::post('/login', [UserController::class, 'login']);

Route::get("/logout", function(){
    Session::flush();
    return redirect('login');
})->name("logout");


Route::group(["middleware" => ["customAuth"]], function(){
    Route::get("/homepage", [pageController::class, 'homepage'])->name("homepage");
    Route::post('/sendFriendRequest', [UserController::class, 'sendFriendRequest']);
    Route::get('/notification', [pageController::class, 'notification']);
});


