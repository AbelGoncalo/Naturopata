<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white h-4">Registro Clínico</h1>
    </div>
    <!-- Single Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="card ">
                    <div class="card-header text-center">
                        <h4>Dados Pessoais</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <p><strong>Nome:</strong> Abel Goncalo</p>
                                <p><strong>Nascimento:</strong> 12/05/2021</p>
                                <p><strong>Género:</strong> Masculino</p>
                                
                            </div>
                            <div class="col-4 mx-auto">
                                <p><strong>BI:</strong> 121324LD5</p>
                                <p><strong>Provincia:</strong> Luanda</p>
                                <p><strong>Endereço:</strong> Zango</p>
                            </div>
                            <div class="col-4 mx-auto">
                                <p><strong>Telefone:</strong> 935056655</p>
                                <p><strong>Email:</strong> eemplo@gmail.com</p>
                                
                            </div>
                        </div> 
                    </div>
                </div>

                <h4 class="text-center mt-2">Histórico Clínico</h4>
                <div class="divider-short"></div>
                <div class="card  ">
                    <div class="card-header text-center">

                        <div class="form-group col-md-4 py-2">
                            <input type="search" wire:model.live='search' name="search" id="search" class="form-control rounded" placeholder="Pesquisar Categoria">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Exame</th>
                                        <th>Resultado</th>
                                        <th>Diágnostico</th>
                                        <th>Procedimento</th>
                                        <th>Terapeuta</th>
                                        @if(Auth::user()->perfil ==!'utente')
                                            <th>Ações</th>
                                        @endif
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        @if(Auth::user()->perfil ==!'utente')
                                        <th>...</th>
                                    @endif
                                    </tr>
                                </tbody>

                            </table>
                            
                        </div> 
                    </div>
                </div>

               
                <div class="card  mt-4">
                    <div class="card-header text-center">
                        
                        <h4 class="text-center mt-2">Histórico de Actividades</h4>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Exame Marcados</th>
                                        <th>Marcado a</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Sangue</td>
                                        <td>10/08/2023</td>   
                                    </tr>
                                </tbody>

                            </table>
                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
</div>

