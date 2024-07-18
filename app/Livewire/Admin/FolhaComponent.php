<?php

namespace App\Livewire\Admin;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\{Planta,Folha};
use Rap2hpoutre\FastExcel\FastExcel;
//use OpenSpout\Common\Entity\Style\Style;



use Livewire\Component;

class FolhaComponent extends Component
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
        return view('livewire.admin.folha-component',[
            'plantas'=>$this->getPlantas(),
            'folhas'=>$this->searchFolha($this->search)
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

    public function searchFolha($search){

        try {
            if($search !=null){

                return Folha::where('nome','like','%'.$search.'%')->get();
            }else{
                return Folha::get();
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
                    $this->imagem->storeAs('/public/folhas/',$imagemString);

            }

            Folha::create([
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

    public function editFolha($id){

        try {

            $item = Folha::find($id);
            $this->edit = $item->id;
            $this->nome = $item->nome;
            $this->tipo = $item->tipo;
            $this->descricao = $item->descricao;
            $this->imagem = $item->imagem;
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
                    $this->imagem->storeAs('/public/folhas/',$imagemString);

            }
            Folha::find($this->edit)->update([
                'nome'=>$this->nome,
                'tipo'=>$this->tipo,
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


    public function confirm($id){
        try {
            $this->edit=$id;
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

            dd($this->edit);
            Folha::destroy($this->edit);
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
        $this->nome = '';
        $this->descricao = '';
        $this->tipo = '';
        $this->edit = '';
        $this->imagem = '';
        $this->planta_id = '';
        $this->search = '';
    }

    public function exportExcel(){

        try {
            $dados = Folha::get();

            $customerData = [];

            foreach ($dados as $value) {
               array_push($customerData,[
                'nome'=>$value->nome,
                'tipo'=>$value->tipo,
                'descricao'=>$value->descricao
               ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $row_style = (new Style())
            //     ->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgriundColor('EDEDED');

            return (new FastExcel($customerData))
                // ->headerStyle($header_style)
                // ->rowStyle($row_style)
                ->download('folhas.xlsx');

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

            $dados = Folha::get();
            $customerData = [];

            foreach ($dados as $value) {
               array_push($customerData,[
                'nome'=>$value->nome,
                'tipo'=>$value->tipo,
                'descricao'=>$value->descricao,

               ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $row_style = (new Style())
            //     ->setShouldWrapText()
            //     ->setBackgroundColor();

            return (new FastExcel($customerData))
                // ->headerStyle($header_style)
                // ->rowStyle($row_style)
                ->download('folhas.csv');

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
