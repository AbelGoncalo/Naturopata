<!-- Modal Search Start -->
<div class="modal fade" id="consulta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md ">
        <div class="modal-content rounded-1 ">
            <div class="modal-header text-center card-header">
                <i class="mr-2 fa fa-align-justify"></i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex align-items-center card-body bg-secundary">

                <div class="card">

                    <div class="card-header text-center">
                        <h4>Marcar Consulta</h4>
                        <p class="text-small">Também podes marcar uma consulta atravez dos terminais telefónicos. </p>
                    </div>

                    <div class="card-body">
                        <form wire:submit=""  class="container">
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <input type="date" wire:model='bi' name="bi" id="bi" class="form-select ">
        
                                    @error('genero') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <select wire:model="genero" name="genero" id="genreselect" class="form-select  form-control-sm">
                                        <option value=""> --selecione exame-- </option>
                                        <option value="masculino">Bioenergético</option>
                                    </select>
                                    @error('genero') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <div class="form-group col-md-12 input-group">
                                    <label class="input-group-text" value="Alguma questão?" for="mensagem">Mensagem</label>
                                    <textarea name="mensagem" class="form-control" id="" >Alguma questão?</textarea>
                                    @error('mensagem') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div>

                            <div class="card-footer text-center">
                                <h4>Dados do Utente</h4>
                            </div>
                            <div class="form-group col-md-12  mb-3">
                                <input type="text" wire:model='nome' name="nome" id="nome" placeholder="Nome completo" class="form-control form-control-sm">
                                @error('nome') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <input type="tel" wire:model='email' name="email" id="email" placeholder="E-mail" class="form-control form-control-sm">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-12  mb-3">
                                <input type="tel" wire:model='telefone' name="telefone" id="telefone" placeholder="Telefone" class="form-control form-control-sm">
                                @error('telefone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group form-check">
                                <label class="custom-control custom-checkbox form-check-label">
                                    <input class="custom-control-input form-check-input " wire:model='termo' type="checkbox"><span class="custom-control-label">Aceito os termos</span>
                                </label>
                                @error('termo') <span class="text-danger">{{$message}}</span> @enderror

                            </div>
                            <div class="form-group mt-2 col-md-12 d-flex justify-content-center flex-wrap align-items-center" >
                                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                                    Marcar
                                </button>
                            </div> 
                        </form>
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->