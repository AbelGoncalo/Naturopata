<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Utente\{MyAccount,RegisterClinic};

Route::get('/utente/perfil',MyAccount::class)->name('utente.profile');
Route::get('/utente/registro',RegisterClinic::class)->name('utente.registerClinic');








