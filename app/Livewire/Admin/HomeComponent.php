<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\{User,Planta,Consulta};

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.home-component',[
            'utentes'=>$this->getUtentes(),
            'plantas'=>$this->getPlantas(),
            'consultas'=>$this->getConsultas(),

        ])->layout('layouts.admin.app');
    }

    //listar utentes
    public function getUtentes(){
        try {
            return User::where('perfil','utente')->get();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    //listar plantas
    public function getPlantas(){
        try {
            return Planta::get();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    //listar consultas
    public function getConsultas(){
        try {
            return Consulta::where('status','afazer')->get();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
