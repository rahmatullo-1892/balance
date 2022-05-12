<?php

use App\Http\Controllers\Authorization;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::get("/", [Users::class, "index"]);

Route::get('/sigin', [Authorization::class, "signIn"])->name("sign_in");
