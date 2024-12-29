<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/', \App\Http\Controllers\Controller::class . '@index');
