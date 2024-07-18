<div>
   
    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded myaccount">
                <div class="row g-4">
                    
                    <div class="card  mt-5">
                        <div class="card-header text-center">
                            <h4>INFORMAÇÕES DA CONTA</h4>
                        </div>
                        <div class="card-body">

                            <form wire:submit="updateAccount"  class="container">
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="nome">Nome</label>
                                        <input type="text" wire:model='nome' name="nome" id="nome" class="form-control">
                                        @error('nome') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="nascimento">Nascimento</label>
                                        <input type="text" wire:model='nascimento' name="nascimento" id="nascimento" class="form-control">
                                        @error('nascimento') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="endereco">Endereço</label>
                                        <input type="text" wire:model='endereco' name="endereco" id="endereco" class="form-control">
                                        @error('endereco') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                   
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="genero">Género</label>
                                        <select wire:model="genero" name="genero" id="genreselect" class="form-control">
                                            <option value="">--Selecionar--</option>
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Feminino</option>  
                                        </select>
                                        @error('genero') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="bi">Nº BI</label>
                                        <input type="text" wire:model='bi' name="bi" id="bi" class="form-control">
                                        @error('bi') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="provincia">Provincia</label>
                                        <select wire:model="provincia" name="provincia" id="genreselect" class="form-control">
                                            <option value="">--Selecionar--</option>
                                            <option value="Benguela">Benguela</option>
                                            <option value="Huíla">Huíla</option> 
                                            <option value="Malange">Malange</option>  
                                            <option value="Cunene">Cunene</option>  
                                            <option value="Bié">Bié</option>   
                                        </select>
                                        @error('provincia') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="email">E-mail</label>
                                        <input type="email" wire:model='email' name="email" id="email" class="form-control">
                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="telefone">Telefone</label>
                                        <input type="tel" wire:model='telefone' name="telefone" id="telefone" class="form-control">
                                        @error('telefone') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="imagem">Fotografia</label>
                                        <input type="file" wire:model='imagem' name="imagem" id="imagem" class="form-control">
                                        @error('imagem') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-12 d-flex justify-content-end flex-wrap align-items-center" >
                                    <button type="submit" class="btn btn-md " style=" background-color: #222831e5;color:#fff;">
                                        ACTUALIZAR
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <h4>ALTERAR SENHA</h4>
                            <hr>
                            <form wire:submit='updatePassword' method="post" class="container">
                                <div class="row mb-3">
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="password">Senha Actual</label>
                                        <input type="password" wire:model='password' name="password" id="password" class="form-control">
                                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="npassword">Nova Senha</label>
                                        <input type="password" wire:model='npassword' name="npassword" id="npassword" class="form-control">
                                        @error('npassword') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="name">Confirmar Senha</label>
                                        <input type="password" wire:model='cpassword' name="cpassword" id="cpassword" class="form-control">
                                        @error('cpassword') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-12 text-end d-flex justify-content-end flex-wrap align-items-center">
                                    <button type="submit" class="btn btn-md " style=" background-color: #222831e5;color:#fff;">
                                        ACTUALIZAR
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>
