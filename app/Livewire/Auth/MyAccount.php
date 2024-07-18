<?php

namespace App\Livewire\Auth;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\{USer};

class MyAccount extends Component
{

    use LivewireAlert;
    public $nome,$email, $telefone, $password, $npassword, $cpassword, $edit;
    protected $listeners = ['confirmed' => 'confirmed'];

    public function render()
    {
        return view('livewire.auth.my-account')->layout('layouts.auth.app');
    }

    public function validateFields($id = null)
    {
         $rules = [
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'required|unique:users,email,'.$id,
        ];
          $messages = [
            'nome.required'=>'Obrigatório',
            'telefone.required'=>'Obrigatório',
            'email.required'=>'Obrigatório',
        ];
      return  $this->validate($rules,$messages);
    }

    public function mount()
    {
        try {
            $this->nome = auth()->user()->nome;
            $this->telefone = auth()->user()->id;
            $this->email = auth()->user()->email;

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function updateAccount()
    {
        $this->validateFields(auth()->user()->id);
        try {

            User::find(auth()->user()->id)->update([
                'nome'=>$this->nome,
                'telefone'=>$this->telefone,
                'email'=>$this->email,
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação realizada com sucesso'
            ]);

            
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    
    public function updatePassword()
    {
         $this->validate([
            'password'=>'required',
            'npassword'=>'required',
            'cpassword'=>'required|same:npassword',
        ],[
            
            'password.required'=>'Obrigatório',
            'npassword.required'=>'Obrigatório',
            'cpassword.required'=>'Obrigatório',
            'cpassword.same'=>'Senhas diferentes',
        ]);
        try {

            if (\Hash::check($this->password,auth()->user()->password)) {
                
                User::find(auth()->user()->id)->update([
                    'password'=>$this->npassword,
                ]);
                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Perfil Actualizado'
                ]);
                $this->password = '';
                $this->npassword = '';
                $this->cpassword = '';
            }else{

                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Senha Actual inválida'
                ]);
            }
            
        } catch (\Throwable $th) {

            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }



}
