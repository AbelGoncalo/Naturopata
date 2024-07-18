<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ .'/site/routes.php';
require __DIR__ .'/auth/routes.php';
require __DIR__ .'/admin/routes.php';
require __DIR__ .'/utente/routes.php';



Route::get('/cifra', function(){

    return Hash::make('12345678');
});


