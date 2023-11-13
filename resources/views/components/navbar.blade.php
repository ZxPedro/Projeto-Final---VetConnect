<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">VetConnect</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-house pe-1"></i>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/cadastros/agendamento" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa-regular fa-calendar pe-1"></i></i>Agendamento</span></a>
                    </li>
                    <li>
                        <a href="{{ route('customer-list') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-person pe-1"></i>Cliente</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-gears pe-1"></i>Gestão</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{route('professionals-list')}}" class="nav-link px-3"> <span class="d-none d-sm-inline">Profissionais</span></a>
                            </li>
                            <li>
                                <a href="{{ route('user-list') }}" class="nav-link px-3"> <span class="d-none d-sm-inline">Usuários</span></a>
                            </li>
                            <li>
                                <a href="{{route('categories-list')}}" class="nav-link px-3"> <span class="d-none d-sm-inline">Categorias</span></a>
                            </li>
                            <li>
                                <a href="{{route('services-list')}}" class="nav-link px-3"> <span class="d-none d-sm-inline">Serviços</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Outros</span> </a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Opção</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Opção</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Opção</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Opção</span> 4</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <!-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>