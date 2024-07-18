@section('title','Minha Conta')
<div class="container mt-5">
    <div class="row col-md-12 d-flex justify-content-between align-items-start flex-wrap">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4>INFORMAÇÕES DA CONTA</h4>
                </div>
                <div class="card-body">
                    <form wire:submit="updateAccount"  class="container">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" wire:model='nome' name="nome" id="nome" class="form-control">
                                @error('nome') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" wire:model='email' name="email" id="email" class="form-control">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                           
                            <div class="form-group col-md-12 d-flex justify-content-end flex-wrap align-items-center" >
                                <button type="submit" class="btn btn-md " style=" background-color: #222831e5;color:#fff;">
                                    ACTUALIZAR
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4>ALTERAR SENHA</h4>
                    <hr>
                    <form wire:submit='updatePassword' method="post" class="container">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="password">Senha Actual</label>
                                <input type="password" wire:model='password' name="password" id="password" class="form-control">
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">Nova Senha</label>
                                <input type="password" wire:model='npassword' name="npassword" id="npassword" class="form-control">
                                @error('npassword') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Confirmar Senha</label>
                                <input type="password" wire:model='cpassword' name="cpassword" id="cpassword" class="form-control">
                                @error('cpassword') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-12 text-end d-flex justify-content-end flex-wrap align-items-center">
                                <button type="submit" class="btn btn-md " style=" background-color: #222831e5;color:#fff;">
                                    ACTUALIZAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
