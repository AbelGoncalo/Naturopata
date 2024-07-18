<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naturopata - </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">Zango IV - Viana-Luanda</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">Email@Example.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="text-white mx-2">Termos de
                            Responsabilidade</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{route('site.home')}}" class="navbar-brand">
                    <h1 class=" display-6 logo">Naturo<span class="text-primary">pata.</span></h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('site.home') }}" class="nav-item nav-link {{(Route::Current()->getName()=='site.home'? 'active':'')}}">Início</a>
                        <a href="{{route('site.about')}}" class="nav-item nav-link {{(Route::Current()->getName()=='site.about'? 'active':'')}}">Sobre mim</a>
                        <a href="{{route('site.naturopathy')}}" class="nav-item nav-link {{(Route::Current()->getName()=='site.naturopathy'? 'active':'')}}">Naturopatia</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Serviços</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="cart.html" class="dropdown-item">Cart</a>
                                <a href="chackout.html" class="dropdown-item">Chackout</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="{{route('site.contact')}}" class="nav-item nav-link {{(Route::Current()->getName() == 'site.contact'?'active':'')}}">Contacto</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                       
                        @guest

                            <a href="{{route('auth.login')}}"
                                class=" bg-light btn border border-secondary btn-md-square rounded-circle bg-white me-4">
                                <i class="fas fa-search text-primary"></i>
                            </a>
                        @endguest

                        @auth

                            @if(auth()->user()->perfil =='administrador')
                                <div class="nav-item dropdown">
                                    <a href="#" class="my-auto nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-user fa-2x"></i>  
                                    </a>  
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <a href="{{route('painel.admin.account')}}" class="dropdown-item"><i class="fas fa-user mx-2"></i>Perfil</a>
                                        <a href="{{route('painel.admin.home',auth()->user()->id)}}" class="dropdown-item"><i class="fas fa-table mx-2"></i>Painel Administrativo</a>
                                        @livewire('auth.logout')
                                    </div>
                                </div>
                            @elseif(auth()->user()->perfil =='utente')

                                <div class="nav-item dropdown dropdown-menu-start">
                                    <a href="#" class="my-auto nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-user fa-2x"></i>  
                                    </a>  
                                    <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                        <a href="{{route('utente.profile')}}" class="dropdown-item"><i class="fas fa-user mx-2"></i>Perfil</a>
                                        <a href="{{route('utente.registerClinic')}}" class="dropdown-item"><i class="fas fa-table mx-2"></i>Registro Clínico</a>
                                        <a href="" class="dropdown-item"><i class="fas fa-edit mx-2"></i>Marcar Consulta</a>
                                        @livewire('auth.logout')
                                    </div>
                                </div>
                            @endif
                           
                        @endauth  
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    

    {{$slot}}

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0 logo">Naturopata</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <div class="d-flex justify-content-end pt-3">

                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Tratamos</h4>
                        <a class="btn-link" >Células Falsiforme</a>
                        <a class="btn-link" >Sídrome de Down</a>
                        <a class="btn-link" >Ácido Úrico</a>
                        <a class="btn-link" >Doenças Uterinas</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Links Frequentes</h4>
                        <a class="btn-link {{(Route::Current()->getName() =='site.home'?'active':'')}}" href="{{ route('site.home') }}" >Inicio</a>
                        <a class="btn-link {{(Route::Current()->getName() == 'site.about'?'active':'')}}" href="{{route('site.about')}}">Sobre mim</a>
                        <a class="btn-link {{(Route::Current()->getName() == 'site.naturopathy'?'active':'')}}" href="{{route('site.naturopathy')}}">Natoropatia</a>
                        <a class="btn-link {{(Route::Current()->getName() == 'site.contact'?'active':'')}}" href="{{route('site.contact')}}">Contacte-nos</a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contato</h4>
                        <p>Endereço: Zango IV, Viana - Luanda </p>
                        <p>Email: Example@gmail.com</p>
                        <p>Tel: 923242880 / 993522669</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>
                            </a>Todos direitos
                        reservados.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Desenvolvido por <a class="border-bottom" href="https://htmlcodex.com">AgCode</a> Siga nos<a
                        class="border-bottom" href="https://themewagon.com"> <i
                        class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('site/js/main.js') }}"></script>

    @stack('select2')
    @stack('chart')

    @livewireScripts
    @stack('scripts')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>
