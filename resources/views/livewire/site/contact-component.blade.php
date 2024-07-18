<div>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white h-4">Conecta-te comigo por aqui</h1>

    </div>
    <!-- Single Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="text-center mx-auto" style="max-width: 700px;">
                            <h1 class="text-primary">Get in touch</h1>
                            <p class="mb-4">The contact form is currently inactive. Get a functional and working
                                contact
                                form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code
                                and
                                you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form wire:submit="sendMessage"  class="container">
                            <div class="row mb-3">
                                
                                <div class="form-group col-md-12">
                                    <select wire:model="assunto" name="assunto" id="assuntoselect" class="form-select  ">
                                        <option value=""> -- Seleionar Assunto-- </option>
                                        <option value="Reclamação">Reclamação</option>
                                        <option value="sugestáo">Sugestão</option>
                                        <option value="Dúvidas">Dúvidas</option>

                                    </select>
                                    @error('assunto') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12  mb-3">
                                <input type="text" wire:model='nome' name="nome" id="nome" placeholder="Nome completo" class="form-control ">
                                @error('nome') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <input type="tel" wire:model='email' name="email" id="email" placeholder="E-mail" class="form-control ">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
        
                            <div class="row mb-3">
                                <div class="form-group col-md-12 input-group">
                                    <label class="input-group-text" value="Alguma questão?" for="mensagem">Mensagem</label>
                                    <textarea name="mensagem" wire:model='mensagem' class="form-control" id="" ></textarea>
                                </div> 
                                @error('mensagem') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            
                           
                            
                            
                           
                            <div class="form-group mt-2 col-md-12 d-flex justify-content-center flex-wrap align-items-center" >
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary "
                                type="submit">Enviar mensagem</button>
                            </div> 
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Endereco</h4>
                                <p class="mb-2">Zango IV Luanda - Viana</p>

                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Nosso Email</h4>
                                <p class="mb-2">exemplo@.com</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telefone</h4>
                                <p class="mb-2">(+244) 999 999 999</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>
