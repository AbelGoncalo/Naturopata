<form method="POST" wire:submit='createAccount'
    class="col-md-12 d-flex justify-content-center align-items-center flex-wrap">
    @csrf
    @method('POST')

    <div class="card col-md-6">

        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='nome'
                        type="text" name="nome" placeholder="Informe o Nome" autocomplete="off">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="nascimento">Nascimento<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='nascimento'
                        type="date" name="nascimento" placeholder="Informe o Sobrenome" autocomplete="off">
                    @error('nascimento')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="genero">Género<span class="text-danger">*</span></label>
                        <select wire:model="genero" name="genero" id="genreselect" class="form-control">
                            <option value="">--Selecionar--</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Feminino</option>  
                    </select>
                        @error('genero')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="form-group col-md-6">
                    <label for="bi">Nº BI<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='bi'
                        type="text" name="bi" placeholder="Informe o Nome" autocomplete="off">
                    @error('bi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="provincia">Provincia<span class="text-danger">*</span></label>
                    <select wire:model="provincia" name="provincia" id="eselect" class="form-control">
                        <option value="">--Selecionar--</option>
                        <option value="Benguela">Benguela</option>
                        <option value="Huíla">Huíla</option> 
                        <option value="Malange">Malange</option>  
                        <option value="Cunene">Cunene</option>  
                        <option value="Bié">Bié</option>  

                    </select>
                    @error('provincia')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="endereco">Endereço<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='endereco'
                        type="text" name="endereco" placeholder="Informe seu endereço" autocomplete="off">
                    @error('endereco')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" wire:model='email'
                        id="email" type="email" placeholder="Informe o E-mail">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="telefone">Telefone<span class="text-danger">*</span></label>
                    <input onkeypress="$(this).mask('999-999-999')"
                        class="form-control  form-control-lg form-control form-control-sm  form-control-lg-lg"
                        wire:model='telefone' id="telefone" type="phone" placeholder="Informe o Telefone">
                    @error('telefone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="password">Senha<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" type="password"
                        wire:model='password' id="password" name="password" placeholder="Informe a Senha">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="cpassword">Confirmar Senha<span class="text-danger">*</span></label>
                    <input class="form-control  form-control-lg form-control  form-control-lg-lg" type="password"
                        wire:model='cpassword' id="cpassword" name="cpassword" placeholder="Confirmar Senha">
                    @error('cpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group pt-2">
                <button style="background-color: #ffbe33" class="btn btn-block" type="submit">Registrar minha
                    Conta</button>
            </div>
           
        </div>
        <div class="card-footer bg-white text-center" style="margin-top:-2rem">
            <span>Já tem uma conta? <a href="{{ route('auth.login') }}" class="text-secondary">Fazer
                    Login.</a></span><br>
            <span><a href="{{ route('site.home') }}">Ir para início</a></span>

        </div>
    </div>

</form>


@push('countryselect')
    <script>
        $(document).ready(function() {
            $('#countryselect').select2({
                theme: "bootstrap-5"
            });

            $('#countryselect').change(function(e) {
                e.preventDefault();
                @this.set('countryid', $('#countryselect').val());
            });
        });
    </script>
@endpush
