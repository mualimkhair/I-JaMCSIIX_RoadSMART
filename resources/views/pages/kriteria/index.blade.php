@extends('layouts/_main')
@section('main')
<div class="col-lg-12">
    <div class="row row-cols-3 g-3 justify-content-center">
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        @if (request()->routeIs('kriteria.index'))
        <div class="col-lg-2">
            <div class="d-grid">
                <a href="{{ route('index') }}" class="btn btn-lg btn-secondary rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="d-grid">
                <a href="{{ route('kriteria.create') }}" class="btn btn-lg btn-success rounded-pill text-white">
                    <i class="bi bi-plus-circle-fill"> Tambah Kriteria</i>
                </a>
            </div>
        </div>
        @endif
        @includeWhen(request()->routeIs('kriteria.create') || request()->routeIs('kriteria.edit'),
        'pages/kriteria/_form')
        @includeWhen(request()->routeIs('kriteria.index'), 'pages/kriteria/_table')
    </div>
</div>
@endsection