<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Planta,Doenca, DoencaPlanta};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\{WithFileUploads,Pagination};

class DoencaPlantaComponent extends Component
{

    use LivewireAlert,WithFileUploads;
    public $planta_id, $doenca_id, $edit, $search;
    protected $rules = ['planta_id'=>'required','doenca_id'=>'required'];
    protected $messages = [
        'planta_id.required'=>'Obrigatório',
        'doenca_id.required'=>'Obrigatório',
    ];
    public function render()
    {
        return view('livewire.admin.doenca-planta-component',[
            'doencaPlanta'=>$this->search($this->search),
            'plantas'=>$this->plantas(),
            'doencas'=>$this->doencas()
        ])->layout('layouts.admin.app');
    }

    public function search($search){
        try {
            if($search != null){
                return DoencaPlanta::where('nome','like','%'.$search.'%')->get();
            }else{
               
                return DoencaPlanta::get();
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

    public function plantas(){
        try {
            return Planta::get();
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

    public function doencas(){
        try {
            return Doenca::get();
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

    public function save(){

        $this->validate($this->rules, $this->messages);
        try {
            
            foreach($this->doenca_id as $id){
                DoencaPlanta::create([
                    'planta_id'=>$this->planta_id,
                    'doenca_id'=>$id,
                ]);
            }
            
            $this->clear();

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
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

    public function editee($id){

       

        try {

            $item = DoencaPlanta::find($id);

            $this->edit = $item->id;
            $this->planta_id = $item->planta_id;
            $this->doenca_id = $item->doenca_id;

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

    public function update(){

        $this->validate($this->rules,$this->messages);
        try {
            DoencaPlanta::find($this->edit)->update([
                'planta_id'=>$this->planta_id,
                'doenca_id'=>$this->doenca_id
            ]);
            $this->clear();
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
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

       //excluir planta
       public function delete(){
        try {

          
            DoencaPlanta::destroy($this->edit);
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

        $this->planta_id = null;
        $this->doenca_id = null;
    }
}
