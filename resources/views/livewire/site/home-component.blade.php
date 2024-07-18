<div>

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <div class="mb-4 display-6 text-success">PROCURANDO CONSULTA DE NATUROPATIA?</div>
                    <h4 class="mb-3 text-dark">
                        Bem-vindo(a) ao nosso espaço dedicado à Medicina Natural, aqui busco promover uma abordagem
                        integrativa que valorize a harmonia entre corpo, mente e espírito para alcançar o bem-estar
                        pleno.
                    </h4>
                    <div class="position-relative mx-auto">
                      
                            <div class="btn-group">
                                <button class="btn btn-primary text-white" data-bs-toggle="offcanvas" data-bs-target="#doencas">DOENÇAS</button>
                                <button class="btn btn-primary text-white" data-bs-toggle="offcanvas" data-bs-target="#planta">PLANTAS</button>
                            </div>
                    </div>

                    @include('livewire.site.page.offcanvas')
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="{{ asset('site/img/hero-img-1.png') }}"
                                    class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="{{ asset('site/img/hero-img-2.jpg') }}" class="img-fluid w-100 h-100 rounded"
                                    alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <div class="divider-1"></div>
    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-5">
        <div class="container py-5">
            <div class="row g-4">

                <div class="col-md-6 col-lg-4">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Segurança no pagamento</h5>
                            <p class="mb-0">100% de segurançano pagamento</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>30 Dia Rembolso</h5>
                            <p class="mb-0">30 dia de garantia</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x text-white"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Atendimento</h5>
                            <p class="mb-0">Atendimento rápido</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->
    <div class="divider-2"></div>
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h3>Tratamento Natural para problemas frequentes.</h3>
                    </div>
                    <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                    href="#tab-6">
                                    <span class="text-dark" style="width: 130px;">Frutos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">Folhas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Caules</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Raizes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill"
                                    href="#tab-5">
                                    <span class="text-dark" style="width: 130px;">Seivas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    
                    <div id="tab-6" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @if (isset($frutos) and $frutos->count()>0)
                                        @foreach ($frutos as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{($item->imagem != null) ? asset('storage/frutos/'.$item->imagem): asset('no-image.png')}}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute text-center"
                                                        style="top: 10px; left: 100px;">Caule
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{$item->nome?? ''}}</h4>
                                                        <p>{{$item->descricao?? ''}}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                mais</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                            {{$frutos->links('pagination::bootstrap-5')}}
                                    @else
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Categoria Encontrada</p>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @if (isset($folhas) and $folhas->count()>0)
                                        @foreach ($folhas as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{($item->imagem != null) ? asset('storage/folhas/'.$item->imagem):asset('no-image.png')}}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute text-center"
                                                        style="top: 10px; left: 100px;">Caule
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{$item->nome?? ''}}</h4>
                                                        <p>{{$item->descricao?? ''}}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                mais</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                            {{$folhas->links('pagination::bootstrap-5')}}
                                    @else
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Categoria Encontrada</p>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @if (isset($caules) and $caules->count()>0)
                                        @foreach ($caules as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{($item->imagem != null) ? asset('storage/caules/'.$item->imagem): asset('no-image.png')}}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute text-center"
                                                        style="top: 10px; left: 100px;">Caule
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{$item->nome?? ''}}</h4>
                                                        <p>{{$item->descricao?? ''}}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                mais</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                            {{$caules->links('pagination::bootstrap-5')}}
                                    @else
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Categoria Encontrada</p>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @if (isset($raizes) and $raizes->count()>0)
                                        @foreach ($raizes as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                       
                                                        <img src="{{($item->imagem != null)?asset('storage/raizes/'.$item->imagem):asset('no-image.png')}}"
                                                        class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute text-center"
                                                        style="top: 10px; left: 100px;">Raíz
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{$item->nome?? ''}}</h4>
                                                        <p>{{$item->descricao?? ''}}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                mais</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                            {{$raizes->links('pagination::bootstrap-5')}}
                                    @else
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Categoria Encontrada</p>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @if (isset($seivas) and $seivas->count()>0)
                                        @foreach ($seivas as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="rounded position-relative fruite-item">
                                                    <div class="fruite-img">
                                                        <img src="{{($item->imagem != null) ? asset('storage/seivas/'.$item->imagem): asset('no-image.png')}}"
                                                            class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute text-center"
                                                        style="top: 10px; left: 100px;">Caule
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                        <h4>{{$item->nome?? ''}}</h4>
                                                        <p>{{$item->descricao?? ''}}</p>
                                                        <div class="d-flex justify-content-between flex-lg-wrap">

                                                            <a href="#"
                                                                class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                                    class="fa fa-shopping-bag me-2 text-primary"></i>Saiba
                                                                mais</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                            <div class="">

                                                {{$seivas->links('pagination::bootstrap-5')}}
                                            </div>
                                    @else
                                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 25vh">
                                            <i class="fa fa-5x fa-caret-down text-muted"></i>
                                            <p class="text-muted">Nenhuma Categoria Encontrada</p>
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
    <div class="divider-1"></div>
    

    <!-- Bestsaler Product Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="border rounded">
                        <a href="#">
                            <img src="{{ asset('site/img/peaple/peaple-1.jpg') }}" class="img-fluid rounded"
                                alt="Image">
                        </a>
                    </div>
                </div>

                <div class="col-6 md-6">
                    <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                        <p class="fs-5 text-dark">A prevenção é a cura de praticamente todos os males está no seu
                            alimento, na
                            natureza. Mantenha-se lúcido, alimente-se de uma forma consciente e veja por si próprio as
                            mudanças que isso proporciona na sua vida. Além de viver mais, nós queremos viver melhor,
                            com saúde, disposição e felicidade.
                        </p>
                        <p class="display-6 mt-2 text-dark">Isso é longevidade !</p>
                        <p>Apaixona-te também por um estilo de vida saudável.</p>

                        <p></p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="divider-2"></div>

    <!-- Consult Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    
                    <div class="col-12 text-center">
                        <div class="d-flex p-4 rounded mb-4 bg-white  align-items-center ">
                            
                            <div class="   text-center mx-auto">
                                <h4 class="text-center">Marque uma consulta sem sair de casa</h4>
                               
                                <a data-bs-toggle="modal" data-bs-target="#consulta"
                                    class="btn border border-secondary rounded-pill px-3 text-primary">Marcar
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Consult End -->
    @include('livewire.site.modals.consulta')
</div>
<!-- Bestsaler Product End -->
