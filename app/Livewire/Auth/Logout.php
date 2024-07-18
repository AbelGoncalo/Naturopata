<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;



class Logout extends Component

{
    use LivewireAlert;
    public function render()
    {
        
        return view('livewire.auth.logout')->layout('layouts.auth.app');
    }

    public function logout(){

        try {
            Auth::logout();
            return redirect()->route('site.home');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
