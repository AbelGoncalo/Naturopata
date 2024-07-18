<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\{Planta,Fruta};
use Rap2hpoutre\FastExcel\FastExcel;
//use OpenSpout\Common\Entity\Style\Style;


class FrutoComponent extends Component
{

    use LivewireAlert,WithFileUploads;
    public $nome, $tipo, $descricao,$imagem, $edit, $search, $planta_id;
    protected $listeners = ['close'=>'close','delete'=>'delete'];

    public $rules = [
        'nome'=>'required',
        'tipo'=>'required',
        'descricao'=>'required',
        'planta_id'=>'required'
        
    ];

    public $messages = [
        'nome.required'=>'Obrigatório',
        'tipo.required'=>'Obrigatório',
        'descricao.required'=>'Obrigatório',
        'planta_id.required'=>'Obrigatório'
    ];
    public function render()
    {
        return view('livewire.admin.fruto-component',[
            'plantas'=>$this->getPlantas(),
            'frutos'=>$this->searchFrutos($this->search),
        ])->layout('layouts.admin.app');
    }

    public function getPlantas(){
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

    public function searchFrutos($search){

        try {
            if($search !=null){

                return Fruta::where('nome','like','%'.$search.'%')->get();
            }else{
                return Fruta::get();
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

    public function save(){

        $this->validate($this->rules,$this->messages);
        try {
            $imagemString ='';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/frutos/',$imagemString);

            }

            Fruta::create([
                'nome'=>$this->nome,
                'tipo'=>$this->tipo,
                'descricao'=>$this->descricao,
                'planta_id'=>$this->planta_id,
                'imagem'=>$this->imagem
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

    public function editFruto($id){
        try {
            $item = Fruta::find($id);
            $this->edit = $item->id;
            $this->nome = $item->nome;
            $this->descricao = $item->descricao;
            $this->tipo = $item->tipo;
            $this->planta_id = $item->planta_id;
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
                    $this->imagem->storeAs('/public/frutos/',$imagemString);

            }
            Fruta::find($this->edit)->update([
                'nome'=>$this->nome,
                'tipo'=>$this->tipo,
                'descricao'=>$this->descricao,
                'planta_id'=>$this->planta_id,
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

    public function clear(){
        $this->nome ='';
        $this->planta_id ='';
        $this->imagem='';
        $this->tipo='';
        $this->descricao='';
        $this->edit= '';
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

    public function delete(){
        try {
            Fruta::destroy($this->edit);
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

    public function exportExcel(){
        try {
            $dados = Fruta::get();
            $customerData = [];

            foreach ($dados as $value) {
               array_push($customerData,[
                'nome'=>$value->nome,
                'tipo'=>$value->tipo,
                'descricao'=>$value->descricao
               ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $row_style = (new Style())->setFontSize(10)
            //     ->SetShouldWrapText()
            //     ->setBackgroundColor('EDEDED');

            return (new FastExcel($customerData))
                // ->headerStyle($header_style)
                // ->rowStyle($row_style)
                ->download('frutos.xlsx');
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
            $dados = Fruta::get();
            $customerData = [];
            foreach ($dados as  $value) {
               array_push($customerData,[
                'nome'=>$value->nome,
                'tipo'=>$value->tipo,
                'descricao'=>$value->descricao
               ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $row_style = (new Style())->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgroundColor('EDEDED');

            return (new FastExcel($customerData))
                // ->headerStyle($header_style)
                // ->rowStyle($row_style)
                ->download('fruto.csv');
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
