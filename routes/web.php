<?php
Route::get('/portfolio', function () {
    return view('portfolio');
});

use Illuminate\Support\Facades\Route;
Route::get('/',function(){
    return view('welcome');
});