@extends('layouts/_main')
@section('main')
<div class="col-lg-12">
    <div class="row row-cols-3 g-3 justify-content-center">
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        @if (request()->routeIs('penilaian.index'))
        <div class="col-lg-2">
            <div class="d-grid">
                <a href="{{ route('index') }}" class="btn btn-lg btn-secondary rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="d-grid">
                <a href="{{ route('penilaian.create') }}" class="btn btn-lg btn-success rounded-pill text-white">
                    <i class="bi bi-plus-circle-fill"> Tambah Penilaian</i>
                </a>
            </div>
        </div>
        @endif
        @includeWhen(request()->routeIs('penilaian.create') || request()->routeIs('penilaian.edit'),
        'pages/penilaian/_form')
        @includeWhen(request()->routeIs('penilaian.index'), 'pages/penilaian/_table')
    </div>
</div>
@endsection