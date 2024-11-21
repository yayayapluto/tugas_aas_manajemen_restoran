<?php

use App\Http\Controllers\aditionalController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::view("/", "welcome")->name("home");

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('app.auth.login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name("login.submit");

    Route::get('/register', function () {
        return view('app.auth.register');
    })->name('register');

    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name("register.submit");
});

Route::middleware('auth')->group(function () {

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name("logout");

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', [aditionalController::class, "showDashboard"])->name("dashboard");
        Route::get('/report', [orderController::class, "report"])->name("report");
        Route::resource("/users", userController::class);
        Route::resource("/categories", categoryController::class);
        Route::resource("/menus", menuController::class);
    });

    Route::middleware('role:staff')->group(function () {
        Route::get("/new-order", [orderController::class, "order"])->name("neworder");
        Route::post("/new-order", [orderController::class, "storeOrder"])->name("newOrder.submit");
    });

    Route::get("/order/{order_id}", [orderController::class, "checkOrder"])->name("order");
    Route::get("/orders", [orderController::class, "allOrder"])->name("orders");
});
