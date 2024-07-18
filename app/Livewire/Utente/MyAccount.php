<?php

namespace App\Livewire\Utente;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;


use App\Models\{Utente,User};


class MyAccount extends Component
{
    use LivewireAlert,WithFileUploads;

    public $nome,$nascimento,$bi,$genero,$email,$telefone,$provincia, $endereco,$imagem,
     $password, $npassword, $cpassword;
    protected $listeners = ['confirmed'=>'confirmed'];
    
   


    public function render()
    {
        return view('livewire.utente.my-account',[
            'amount'=>$this->amount(),
        ])->layout('layouts.site.app');
    }


    public function validateFields($id = null){

         $rules = [
            'nome'=>'bail|required|between:3,20',
            'nascimento'=>'required',
            'genero'=>'required',
            'bi'=>'required|min:15|max:15',
            'provincia'=>'required',
            'endereco'=>'required',
            'email'=>'required|unique:users,email|email',
            'email'=>'required|unique:users,email,'.$id,
            'telefone'=>'required',
            'password'=>'required|min:8',
            'npassword'=>'required|min:8',
            'cpassword'=>'required|same:password|min:8',
        ];
    
         $messages = [
            'nome.required'=>'Obrigatório',
            'nome.min'=>'Deve ter pelomenos 8 caracteres',
            'nascimento.required'=>'Obrigatório',
            'genero.required'=>'Obrigatório',
            'bi.required'=>'Obrigatório',
            'provincia.required'=>'Obrigatório',
            'endereco.required'=>'Obrigatório',
            'email.required'=>'Obrigatório',
            'email.unique'=>'Já existe uma conta com este email',
            'email.email'=>'E-mail inválido',
            'telefone.required'=>'Obrigatório',
            'password.required'=>'Obrigatório',
            'cpassword.required'=>'Obrigatório',
            'password.min'=>'Deve ter pelomenos 8 caracteres',
            'cpassword.same'=>'Senhas Diferentes',
            'cpassword.min'=>'Deve ter pelomenos 8 caracteres',
        ];
        $this->validate($rules,$messages);
    }

    public function amount(){

        try {

            $utente= Utente::find(auth()->user()->utente_id);
            $user = User::find(auth()->user()->id);

            $this->nome = $utente->nome;
            $this->nascimento = $utente->nascimento;
            $this->bi = $utente->bi;
            $this->genero = $utente->genero;
            $this->email = $user->email;
            $this->telefone = $utente->telefone;
            $this->imagem = $utente->imagem;
            $this->provincia = $utente->provincia;
            $this->endereco = $utente->endereco;

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


    public function updateAccount(){
        $this->validateFields(auth()->user()->id);

        try {
            /**Insercao de dados na tabela enderecos e contactos */
            \DB::beginTransaction();


            User::find(auth()->user()->id)->update([
                'nome'=>$this->nome,
                'imagem'=>$this->imagem,
                'email'=>$this->email,
            ]);

            Utente::find(auth()->user()->utente_id)->update([
                'nome'=>$this->nome,
                'nascimento'=>$this->nascimento,
                'bi'=>$this->bi,
                'genero'=>$this->genero,
                'telefone'=>$this->telefone,
                'provincia'=>$this->provincia,
                'endereco'=>$this->endereco,
                'imagem'=>$this->imagem
            ]);

            \DB::commit();
            
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
           \DB::rollBack();
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Erro ao realizar operação'
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

            if (Hash::check($this->password,auth()->user()->password)) {
                
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
