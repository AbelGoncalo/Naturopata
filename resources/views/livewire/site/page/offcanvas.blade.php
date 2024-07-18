

<div wire:ignore.self  class="offcanvas offcanvas-top" id="doencas" tabindex="-1" data-bs-scroll="true">
    <div class="container-fluid text-center">
        <div class="card">
            <div class="offcanvas-header card-header">
                <h5 class="offcanvas-title ">Doenças</h5>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
        
                <!-- Contact Start -->
                <div class="card  ">
                    <div class="card-header text-center">

                        <div class="form-group col-md-4 py-2">
                            <input type="search" wire:model.live='doenca' name="doenca" id="doenca" class="form-control rounded" placeholder="Pesquisar pelo nome">
                        </div>
                    </div>

                    @if(isset($doencas) and $doencas->count()>0)

                        @foreach ($doencas as $item)
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane fade show p-0 active">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="row g-4">
                                                    <div class="col-md-3 col-lg-3 ">
                                                        <div class="rounded position-relative fruite-item">
                                                            <div class="fruite-img">
                                                                <img src="{{($item->imagem != null) ? asset('storage/doencas/'.$item->imagem): asset('no-image.png')}}"
                                                                class="img-fluid w-100 rounded-top" alt="">
                                                            </div>
                                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                                style="top: 10px; left: 10px;">Doença</div>
                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                <h4>{{$item->doenca ?? ''}}</h4>
                                                                <p>{{$item->descricao ?? ''}}</p>
                                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                                    <a href="#"
                                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                            class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                        mais</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-9 md-9 col-lg-9  text-center">
                                                        <h2 class="text-center  h-6" style="color: black">Tratamento de plantas</h2>
                                
                                                        <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th>...</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item->plantas as $dados)
                                                                <tr>
                                                                    <td>{{$dados->planta}}</td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                </div> 
                            </div>
                        @endforeach
                        {{$plantas->links('pagination::bootstrap-4')}}
                    @else
                    <tr>
                        <td colspan="3">
                            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                <i class="fa fa-5x fa-caret-down text-muted"></i>
                                <p class="text-muted">Nenhuma Doençao Encontrada, faça uma pesquisa!</p>
                            </div>
                        </td>
                       </tr>
                    @endif
                    
                </div>
                <!-- Contact End -->
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self  class="offcanvas offcanvas-top" id="planta" tabindex="-1" data-bs-scroll="true" >
    <div class="container-fluid text-center">
        <div class="card">
            <div class="offcanvas-header card-header">
                <h5 class="offcanvas-title ">Plantas</h5>
                <button class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
        
                <!-- Contact Start -->
                <div class="card  ">
                    <div class="card-header text-center">

                        <div class="form-group col-md-4 py-2">
                            <input type="search" wire:model.live='planta' name="planta" id="planta" class="form-control rounded" placeholder="Pesquisar pelo nome">
                        </div>
                    </div>

                    @if(isset($plantas) and $plantas->count()>0)

                        @foreach ($plantas as $item)
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane fade show p-0 active">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="row g-4">
                                                    <div class="col-md-3 col-lg-3 ">
                                                        <div class="rounded position-relative fruite-item">
                                                            <div class="fruite-img">
                                                                <img src="{{($item->imagem != null) ? asset('storage/plantas/'.$item->imagem): asset('no-image.png')}}"
                                                                class="img-fluid w-100 rounded-top" alt="">
                                                            </div>
                                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                                style="top: 10px; left: 10px;">Planta</div>
                                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                                <h4>{{$item->planta ?? ''}}</h4>
                                                                <p>{{$item->descricao ?? ''}}</p>
                                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                                    <a href="#"
                                                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                            class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                        mais</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-9 md-9 col-lg-9  text-center">
                                                        <h2 class="text-center  h-6" style="color: black">Doenças que pode tratar</h2>
                                
                                                        <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th>...</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($item->doencas as $dados)
                                                                <tr>
                                                                    <td>{{$dados->doenca}}</td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                </div> 
                            </div>
                        @endforeach
                        {{$plantas->links('pagination::bootstrap-4')}}
                    @else
                    <tr>
                        <td colspan="3">
                            <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                <i class="fa fa-5x fa-caret-down text-muted"></i>
                                <p class="text-muted">Nenhuma Doençao Encontrada, faça uma pesquisa!</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                    
                </div>
                <!-- Contact End -->
            </div>
        </div>
    </div>
</div>

