<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Site\{HomeComponent
    ,AboutComponent,
    ContactComponent,NaturopathyComponent
};

Route::get('/',HomeComponent::class)->name('site.home');
Route::get('/site/sobre.nos',AboutComponent::class)->name('site.about');
Route::get('/site/contacto',ContactComponent::class)->name('site.contact');
Route::get('/site/naturpatia',NaturopathyComponent::class)->name('site.naturopathy');






