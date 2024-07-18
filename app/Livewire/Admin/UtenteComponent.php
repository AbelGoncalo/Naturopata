<?php

namespace App\Livewire\Admin;
use Livewire\Component;
use App\Models\{User};

class UtenteComponent extends Component
{

//    use LivewireAlert,WithFileUploads;
    public $search, $edit;

    protected $listeners = ['close'=>'close','delete'=>'delete','changeStatus'=>'changeStatus'];

    public function render()
    {
        return view('livewire.admin.utente-component',[
            'users'=>$this->searchUtente($this->search)
        ])->layout('layouts.admin.app');
    }

    public function searchUtente($search){

        try {

            if($search != null){

                return User::where('perfil','utente')
                            ->where('nome','like', '%'.$search.'%')
                            ->get();
            }else{
                return User::where('perfil', 'utente')->get();
            }
            
        } catch (\Throwable $th) {
            
            dd($th->getMessage());
        }
    }


    public function confirmChangeStatus($id){

        try {

            $this->edit = $id;

            $this->alert('warning', 'Confirmar', [
                'icon' => 'warning',
                'position' => 'center',
                'toast' => false,
                'text' => "Deseja realmente alterar o estado desta conta?",
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Mudar',
                'confirmButtonColor' => '#3085d6',
                'cancelButtonColor' => '#d33',
                'onConfirmed' => 'changeStatus' 
            ]);
        } catch (\Throwable $th) {
           dd($th->getMessage());
        }
    }

    public function changeStatus(){

        try {
            $user = User::where('id',$this->edit)->get();

            ($user->status==1)? $user->status =0: $user->status=1;
            $user()->save();

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
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

    //Confirmar Exclusao de utente
    public function confirm($id){

        try {
            $this->edit = $id;

            $this->alert('warning', 'Confirmar', [
                'icon' => 'warning',
                'position' => 'center',
                'toast' => false,
                'text' => "Deseja realmente excluir? Não pode reverter a ação",
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Excluir',
                'confirmButtonColor' => '#3085d6',
                'cancelButtonColor' => '#d33',
                'onConfirmed' => 'delete' 
            ]);


        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function delete(){

        try {
            User::destroy($this->edit);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
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
        $this->edit = '';
        $this->search ='';
    }
}
