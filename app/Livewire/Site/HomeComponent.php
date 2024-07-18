<?php

namespace App\Livewire\Site;

use Livewire\{Component,WithPagination};

use App\Models\{Planta,Doenca,Seiva,Fruta,Folha,Caule,Raiz};

class HomeComponent extends Component
{

    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    public $edit, $planta, $doenca, $search;
    public function render()
    {
        return view('livewire.site.home-component',[
            'plantas'=>$this->plantas($this->planta),
            'doencas'=>$this->doencas($this->doenca),
            'folhas'=>$this->folhas(),
            'raizes'=>$this->raizes(),
            'frutos'=>$this->frutos(),
            'caules'=>$this->caules(),
            'seivas'=>$this->seivas()
        ])->layout('layouts.site.app');
    }

    public function plantas($planta){
        try {
            //code...
            if($planta != null){
                return Planta::where('planta', 'like','%'.$planta.'%')->paginate(1);
            }else{

                return Planta::paginate(1);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function doencas($doenca){
        try {
            //code...
            if($doenca != null){
                return Doenca::where('doenca', 'like','%'.$doenca.'%')->paginate(1);
            }else{

                return Doenca::paginate(1);
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function frutos(){
        try {
            return Fruta::paginate(2);
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

    public function raizes(){
        try {
           
            return Raiz::paginate(2);
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

    public function caules(){
        try {
            return Caule::paginate(2);
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

    public function folhas(){
        try {
            return Folha::paginate(2);;
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

    public function seivas(){
        try {
            return Seiva::paginate(2);;
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
