<nav @class([ 'nav-bg navbar navbar-expand-lg py-3 bg-primary shadow-sm border-bottom border-white border-5 fs-4' ,
    // 'fixed-top'=> request()->routeIs('index'),
    ])>
    <div class="container">
        <button class="navbar-toggler col-12 rounded-0 border-0 btn-primary mb-3" data-bs-toggle="collapse"
            data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto text-center justify-content-center">
                @auth
                @if(auth()->user()->role === 'Admin')
                <li class="nav-item">
                    <a @class([ 'nav-link text-white' , 'bg-secondary rounded-0'=> request()->routeIs('akun*'),
                        ]) href="{{ route('akun.index') }}">
                        <i class="bi bi-people-fill"></i> AKUN
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([ 'nav-link text-white' , 'bg-secondary rounded-0'=> request()->routeIs('jalan*'),
                        ]) href="{{ route('jalan.index') }}">
                        <i class="bi bi-signpost-fill"></i> JALAN
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([ 'nav-link text-white' , 'bg-secondary rounded-0'=> request()->routeIs('kriteria*'),
                        ]) href="{{ route('kriteria.index') }}">
                        <i class="bi bi-list"></i> KRITERIA
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([ 'nav-link text-white' , 'bg-secondary rounded-0'=> request()->routeIs('penilaian*'),
                        ]) href="{{ route('penilaian.index') }}">
                        <i class="bi bi-list-check"></i> PENILAIAN
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([ 'nav-link text-white' , 'bg-secondary rounded-0'=> request()->routeIs('rencana*'),
                        ]) href="{{ route('rencana.index') }}">
                        <i class="bi bi-journal-text"></i> RENCANA
                    </a>
                </li>
                @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto text-center justify-content-center">
                {{-- @guest
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">
                        <i class="bi bi-door-open-fill"></i> MASUK
                    </a>
                </li>
                @endguest --}}
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link text-white">
                            <i class="bi bi-door-closed-fill"></i> KELUAR
                        </button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>