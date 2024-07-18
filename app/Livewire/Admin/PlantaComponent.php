<?php

namespace App\Livewire\Admin;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\{Planta};
use Rap2hpoutre\FastExcel\FastExcel;
//use OpenSpout\Common\Entity\Style\Style;

class PlantaComponent extends Component
{
    use LivewireAlert,WithFileUploads;
    public $planta, $descricao,$imagem, $edit, $search;
    protected $listeners = ['close'=>'close','delete'=>'delete'];

    public $rules = [
        'planta'=>'required',
        'descricao'=>'required'
        
    ];

    public $messages = [
        'planta.required'=>'Obrigatório',
        'descricao.required'=>'Obrigatório',
    ];


    public function render()
    {
        return view('livewire.admin.planta-component',[
            'plantas'=>$this->searchPlantas($this->search),
        ])->layout('layouts.admin.app');
    }


    public function searchPlantas($search){
        try {

            if($search != null){
                return Planta::where('planta','like','%'.$search.'%')->get();
            }else{
                
                return Planta::get() ;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function save(){
        $this->validate($this->rules,$this->messages);

        try {

            $imagemString ='';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/plantas/',$imagemString);

            }
            Planta::create([
                'planta'=>$this->planta,
                'descricao'=>$this->descricao,
                'imagem'=>$imagemString
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);
            $this->clear();
        } catch (\Throwable $th) {
            //throw $th;
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


    public function editPlanta($id){
        try {
            $item = Planta::find($id);

            $this->edit = $item->id;
            $this->planta = $item->planta;
            $this->descricao = $item->descricao;
            $this->imagem = $item->imagem;


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

            $imagemString ='';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/plantas/',$imagemString);

            }

            Planta::find($this->edit)->update([
                'planta'=>$this->planta,
                'descricao'=>$this->descricao,
                'imagem'=>$imagemString
            ]);
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

    //confirmar exclusao 
    public function confirm($id){
        try {
            $this->edit= $id;
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

          
            Planta::destroy($this->edit);
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
        $this->planta = '';
        $this->descricao = '';
        $this->edit = '';
        $this->imagem = '';
    }

    public function exportExcel(){
        try {
            $data = Planta::get();
            $customData = [];

            foreach($data as $value){
                array_push($customData,[
                    'Planta'=>$value->planta,
                    'Descrição'=>$value->descricao
                ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $rows_style = (new style())
            //     ->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgroundColor("EDEDED");

            return (new FastExcel($customData))
            // ->headerStyle($header_style)
            // ->rowStyle($rows_style)
            ->download('plantas.xlsx');

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

    public function exportCsv(){
        try {
            $data = Planta::get();
            $customData = [];

            foreach($data as $value){
                array_push($customData,[
                    'Planta'=>$value->planta,
                    'Descrição'=>$value->descricao
                ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $rows_style = (new style())
            //     ->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgroundColor("EDEDED");

            return (new FastExcel($customData))
            // ->headerStyle($header_style)
            // ->rowStyle($rows_style)
            ->download('plantas.csv');

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
