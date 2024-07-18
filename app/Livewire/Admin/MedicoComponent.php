<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class MedicoComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.medico-component')->layout('layouts.admin.app');
    }
}
