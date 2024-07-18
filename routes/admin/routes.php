<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\{HomeComponent,PlantaComponent,
    FrutoComponent,FolhaComponent,CauleComponent,SeivaComponent,
    RaizComponent,MedicoComponent,UtenteComponent,DoencaComponent,
    DoencaPlantaComponent};
use App\Livewire\Auth\MyAccount;

Route::get('painel/admin/home',HomeComponent::class)->name('painel.admin.home')->middleware(['auth','admin']);
Route::get('painel/admin/planta',PlantaComponent::class)->name('painel.admin.planta')->middleware(['auth','admin']);
Route::get('painel/admin/fruto',FrutoComponent::class)->name('painel.admin.fruto')->middleware(['auth','admin']);
Route::get('painel/admin/folha',FolhaComponent::class)->name('painel.admin.folha')->middleware(['auth','admin']);
Route::get('painel/admin/caule',CauleComponent::class)->name('painel.admin.caule')->middleware(['auth','admin']);
Route::get('painel/admin/seiva',SeivaComponent::class)->name('painel.admin.seiva')->middleware(['auth','admin']);
Route::get('painel/admin/raiz',RaizComponent::class)->name('painel.admin.raiz')->middleware(['auth','admin']);
Route::get('painel/admin/medico',MedicoComponent::class)->name('painel.admin.medico')->middleware(['auth','admin']);
Route::get('painel/admin/utente',UtenteComponent::class)->name('painel.admin.utente')->middleware(['auth','admin']);
Route::get('painel/admin/doenca',DoencaComponent::class)->name('painel.admin.doenca')->middleware(['auth','admin']);
Route::get('painel/admin/minha-conta',MyAccount::class)->name('painel.admin.account')->middleware(['auth','admin']);
Route::get('painel/admin/doenca.planta',DoencaPlantaComponent::class)->name('painel.admin.doencaPlanta')->middleware(['auth','admin']);