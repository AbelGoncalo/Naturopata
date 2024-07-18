<?php

namespace App\Livewire\Utente;

use Livewire\Component;

class RegisterClinic extends Component
{
    public function render()
    {
        return view('livewire.utente.register-clinic')->layout('layouts.site.app');
    }
}
