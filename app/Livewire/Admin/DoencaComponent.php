<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Rap2hpoutre\FastExcel\FastExcel;
//use OpenSpout\Common\Entity\Style\Style;


use App\Models\{Doenca};

class DoencaComponent extends Component
{

    use LivewireAlert,WithFileUploads,WithPagination;
    public $doenca,  $descricao,$imagem, $edit, $search;
    protected $listeners = ['close'=>'close','delete'=>'delete'];

    protected $rules =['doenca'=>'required','descricao'=>'required'];
    protected $messages = ['doenca.required'=>'Obrigatório', 'descricao.required'=>'Obrigatório'];

    public function render()
    {
        return view('livewire.admin.doenca-component',[
            'doencas'=>$this->searchDoenca($this->search),
           
        ])->layout('layouts.admin.app');
    }

    public function searchDoenca($search){

        try {
            if($search!= null){
                return Doenca::where('doenca', 'like','%'.$search.'%')->get();
            }else{
                return Doenca::get();
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

       
        $this->validate($this->rules, $this->messages);

        try {
            $imagemString ='';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/doencas/',$imagemString);

            }
            Doenca::create([
                'doenca'=>$this->doenca,
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

   

    public function editDoenca($id){
        try {
            $item = Doenca::find($id);
            $this->edit = $item->id;
            $this->doenca = $item->doenca;
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

            $imagemString = '';
            if($this->imagem){
                
                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                $this->imagem->getClientOriginalExtension();
                $this->imagem->storeAs('/public/doencas/',$imagemString);
            }

            Doenca::find($this->edit)->update([
                'doenca'=>$this->doenca,
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
            Deonca::destroy($this->edit);
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
       
        $this->doenca = null;
        $this->descricao = null;
        $this->imagem = null;


    }

    public function exportExcel(){
        try {
            $dados = Doenca::get();

            $customData = [];

            foreach ($dados as  $value) {
                array_push($customData,[
                    'doenca'=>$value->doenca,
                    'descricao'=>$value->descricao
                ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $row_style = (new Style())
            //     ->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgroundColor('EDEDED');

            return (new FastExcel($customData))
            // ->headerStyle($header_style)
            // ->rowStyle($row_style)
            ->download('doencas.xlsx');
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
            $dados= Doenca::get();

            $customData = [];

            foreach ($dados as $value) {
               array_push($customData,[
                'doença'=>$value->doenca,
                'descrição'=>$value->descricao
               ]);
            }

            // $header_style = (new Style())->setFontBold();
            
            // $row_style = (new Style())->setFontSize(10)
            //   ->setShouldWrapText()
            //   ->setBackgroundColor('EDEDED')
            return (new FastExcel($customData))
            // ->headerStyle($header_style)
            // ->rowStyle($row_style)
            ->download('doencas.csv');


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
