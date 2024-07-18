@section('title','Folhas')
<div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">PAINEL DE ADMINISTRADOR</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Folhas</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="form-group col-md-4">
                        <input type="search" wire:model.live='search' name="search" id="search" class="form-control rounded" placeholder="Pesquisar nome">
                    </div>
                    <div class="">
                        <button class="btn btn-sm btn-primary mt-1" wire:click='exportExcel'><i class="fas fa-file"></i> Exportar Excel</button>
                        <button class="btn btn-sm btn-primary mt-1" wire:click='exportCsv'><i class="fas fa-file"></i> Exportar CVS</button>
                        <button class="btn btn-sm btn-primary mt-1" data-toggle="modal" data-target="#folha"><i class="fa fa-plus"></i> Adicionar</button>
                    </div>
                </div>
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table id="example" class="text-center table table-sm table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Folha</th>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($folhas) and $folhas->count() > 0)
                                    @foreach ($folhas as $item)
                                        <tr>
                                            <td style="width:10%">
                                                <img class="img-fluid rounded-full" style="width: 5rem;height:5rem; border-radius: 100%" src="{{($item->imagem != null) ? asset('storage/folhas/'.$item->imagem): asset('no-image.png')}}" alt="Imagem da folha {{$item->nome}}">
                                            </td>
                                            <td style="">{{$item->nome?? ''}}</td>
                                            <td style="">{{$item->tipo?? ''}}</td>
                                            <td style="">{{$item->descricao?? ''}}</td>

                                            <td class="text-center">     
                                                <button wire:click='editFolha({{$item->id}})' data-toggle="modal" data-target="#folha" class="btn btn-sm btn-primary mt-1"><i class="fa fa-edit"></i></button>
                                                <button wire:click='confirm({{$item->id}})' class="btn btn-sm btn-danger mt-1"><i class="fa fa-trash"></i></button>
                                                
                                            </td>
   
                                        </tr>
                                        
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="3">
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Folha Encontrada</p>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                              
                            </tbody>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    @include('livewire.admin.modals.folha-modal')
</div>


<script>
    document.addEventListener('close',function(){
       $("#category").modal('hide');
    })
    
</script>