<section class="hero d-flex justify-content-center align-items-center text-center text-white"
    style="background-image: url('{{ asset('img/hero.jpg') }}'); ">
    {{-- <section class="hero d-flex justify-content-center align-items-center text-center text-white bg-primary"> --}}
        <div class="overlay">
        </div>
        <div class="container position-relative">
            <img src="{{ asset('img/sigi.png') }}" alt="Logo" class="img-fluid" style="width: 100px">
            <h1 class="display-5 fw-bold mb-0">SIGI RoadSMART</h1>
            <p class="lead">
                Sistem Informasi Geografis
            </p>
            <a class="text-white btn btn-lg btn-secondary rounded-pill" href="{{ route('login') }}">
                <i class="bi bi-door-closed-fill"> MASUK</i>
            </a>
        </div>
    </section>