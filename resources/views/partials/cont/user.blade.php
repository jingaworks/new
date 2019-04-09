
            <nav class="navbar fixed-bottom navbar-expand-md navbar-light bg-light pr-4">
                <button class="navbar-toggler btn-block" type="button" data-toggle="collapse" data-target="#navbarUserMenu" aria-controls="navbarUserMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarUserMenu">
                    <ul class="navbar-nav mr-auto px-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Cont <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cont.arata.produse') }}">Produse</a>
                        </li>
                        @if(auth()->user()->producator && auth()->user()->producator->companie)
                            <li class="nav-item dropup">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUserMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->producator->companie->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownUserMenu">
                                    <a class="dropdown-item" href="{{ route('cont.arata.companie') }}">Vezi datele</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('cont.editeaza.companie') }}">Modifica datele</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropup">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUserMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Producator
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownUserMenu">
                                <a class="dropdown-item" href="{{ route('cont.arata.producator') }}">Vezi datele</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('cont.editeaza.producator') }}">Modifica datele</a>
                                @if(auth()->user()->producator && !auth()->user()->producator->companie)
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('cont.adauga.companie') }}">Inregistreaza Societate</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cont.arata.settings') }}">Setari</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 d-sm-none">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>