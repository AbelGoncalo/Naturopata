<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\{Planta,Raiz};
use Rap2hpoutre\FastExcel\FastExcel;
//use OpenSpout\Common\Entity\Style\Style;


class RaizComponent extends Component
{

    use LivewireAlert,WithFileUploads;
    public $nome, $descricao,$imagem, $edit, $search, $planta_id;
    protected $listeners = ['close'=>'close','delete'=>'delete'];

    public $rules = [
        'nome'=>'required',
        'descricao'=>'required',
        'planta_id'=>'required'
        
    ];

    public $messages = [
        'nome.required'=>'Obrigatório',
        'descricao.required'=>'Obrigatório',
        'planta_id.required'=>'Obrigatório'
    ];
    public function render()
    {
        return view('livewire.admin.raiz-component',[
            'plantas'=>$this->getPlantas(),
            'raizes'=>$this->searchRaiz($this->search)
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

    public function searchRaiz($search){
        try {

            if($search!=null){

                return Raiz::where('nome','like','%'.$search.'%')->get();
            }else{
                return Raiz::get();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function save(){
        $this->validate($this->rules, $this->messages);

        try {

            $imagemString = '';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/raizes/',$imagemString);


            }
            Raiz::create([
                'nome'=>$this->nome,
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

    public function editRaiz($id){
        try {
            $item = Raiz::find($id);
            $this->edit = $item->id;
            $this->nome= $item->nome;
            $this->descricao = $item->descricao;
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

            $imagemString = '';

            if($this->imagem != null){

                $imagemString = md5($this->imagem->getClientOriginalName()).'.'.
                    $this->imagem->getClientOriginalExtension();
                    $this->imagem->storeAs('/public/raizes/',$imagemString);

            }
            Raiz::find($this->edit)->update([
                'nome'=>$this->nome,
                'descricao'=>$this->descricao,
                'imagem'=>$imagemString,
                'planta_id'=>$this->planta_id
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
            Raiz::destroy($this->edit);
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
        $this->edit = '';
        $this->imagem = '';
        $this->planta_id = '';
        $this->search = '';
    }

    public function exportExcel(){
        try {
            $dados = Raiz::get();

            $customData = [];

            foreach ($dados as $value) {
               array_push($customData,[
                'nome'=>$value->nome,
                'descricao'=>$value->descricao
               ]);
            }

            // $header_style = (new Style())->setFontBold();
            // $rows_style = (new Style())
            //     ->setFontSize(10)
            //     ->setShouldWrapText()
            //     ->setBackgroundColor("EDEDED");

            return (new FastExcel($customData))
                // ->headerStyle($header_style)
                // ->owStyle($rows_style)
                ->download('raiz.xlsx');
                
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
            $dados = Raiz::get();
            $customData = [];

            foreach ($dados as $value) {
               array_push($customData,[
                'nome'=>$value->nome,
                'decrição'=>$value->descricao
               ]);
            }

            //  

            return (new FastExcel($customData))
                    // ->headerStyle($header_style)
                    // ->owStyle($rows_style)
                    ->download('caule.csv');
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
