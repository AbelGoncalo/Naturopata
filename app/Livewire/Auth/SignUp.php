<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Datetime;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,Utente,RegistroClinico,HistoricoClinico};

class SignUp extends Component
{

    use LivewireAlert,WithFileUploads;
    public $nome, $nascimento,$genero,$bi,
        $provincia,$endereco, $email,$termos,$perfil, 
        $telefone,$imagem, $password,$cpassword;

    protected $rules = [
        'nome'=>'bail|required|between:3,20',
        'nascimento'=>'required',
        'genero'=>'required',
        'bi'=>'required|min:15|max:15',
        'provincia'=>'required',
        'endereco'=>'required',
        'email'=>'required|unique:users,email|email',
        'telefone'=>'required',
        'password'=>'required|min:8',
        'cpassword'=>'required|same:password|min:8',
    ];

    protected $messages = [
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


    public function render()
    {
        return view('livewire.auth.signup')->layout('layouts.auth.app');
    }

    public function createAccount(){

        
       
        $this->validate($this->rules,$this->messages);

        try {

            //$data_atual = new Datetime('now');
            $data_atual = date('Y-m-d');
            $nascimento = Carbon::parse($this->nascimento)->format('Y-m-d');
            //$ano_atual = Carbon::parse($data_atual)->format('Y');

            if($nascimento >  $data_atual || $nascimento <'1905-0-0' ){

                dd('data invalida');

                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Ano de nascimento invávlido'
                ]);

                return redirect()->back();
            }
             /**Insercao de dados na tabela enderecos e contactos */
            \DB::beginTransaction();

            $utente= Utente::create([
                'nome'=>$this->nome,
                'nascimento'=>$this->nascimento,
                'genero'=>$this->genero,
                'bi'=>$this->bi,
                'provincia'=>$this->provincia,
                'endereco'=>$this->endereco,
                'telefone'=>$this->telefone,
                  
            ]);

            RegistroClinico::create([
                'utente_id'=>$utente->id
            ]);
            HistoricoClinico::create([
                'utente_id'=>$utente->id
            ]);

            User::create([
                'nome'=>$this->nome,
                'perfil'=>'utente',
                'utente_id'=>$utente->id,
                'email'=>$this->email,
                'password'=>\Hash::make($this->password),
               
            ]);

            \DB::commit();
            
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);
            return redirect()->route('site.home');
           
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
}
