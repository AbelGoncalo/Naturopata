<?php

namespace App\Livewire\Site;
use Livewire\Component;
use App\Models\{Mensagem};
use App\Mail\FalaConnosco;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ContactComponent extends Component
{
    public $assunto, $email, $nome, $mensagem;

    protected $rules= [
        'assunto'=>'required',
        'nome'=>'required',
        'email'=>'required',
        'mensagem'=>'required'
    ];

    protected $messages = [
        'assunto.required'=>'Obrigatório',
        'nome.required'=>'Obrigatório',
        'email.required'=>'Obrigatório',
        'email.email' => 'email inválido',
        'mensagem.required'=>'Obrigatório',
    ];



    public function render()
    {
        return view('livewire.site.contact-component')->layout('layouts.site.app');
    }

    public function sendMessage(){
        $this->validate($this->rules,$this->messages);
        try {

            Mail::to($this->email)->send(New FalaConnosco($this->mensagem, $this->nome));

            Mensagem::create([
                'nome'=>$this->nome,
                'email'=>$this->email,
                'mensagem'=>$this->mensagem
            ]);
            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Operação Realizada Com Sucesso.'
            ]);

            $this->clear();
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

    public function clear(){
        $this->name ='';
        $this->email = '';
        $this->mensagem = '';
    }
}
