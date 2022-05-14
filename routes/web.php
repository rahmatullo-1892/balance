<?php

use App\Http\Controllers\Authorization;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::get("/", [Users::class, "index"])->name("main");

Route::get('/signin', [Authorization::class, "signIn"])->name("sign_in");

Route::post("/authorization", [Authorization::class, "authorization"]);

Route::get("/histories", [Users::class, "histories"]);

Route::get("/getHistories", [Users::class, "getHistories"]);
