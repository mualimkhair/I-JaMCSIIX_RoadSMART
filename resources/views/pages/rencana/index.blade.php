@extends('layouts/_main')
@section('main')
<div class="col-lg-12">
    <div class="row row-cols-3 g-3 justify-content-center">
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        @if (request()->routeIs('rencana.index'))
        <div class="col-lg-2">
            <div class="d-grid">
                <a href="{{ route('index') }}" class="btn btn-lg btn-secondary rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-10">
            <form action="{{ route('rencana.store') }}" method="post">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-success rounded-pill text-white">
                        <i class="bi bi-magic"> Jalankan SMART</i>
                    </button>
                </div>
            </form>
        </div>
        @endif
        @includeWhen(request()->routeIs('rencana.create') || request()->routeIs('rencana.edit'),
        'pages/rencana/_form')
        @includeWhen(request()->routeIs('rencana.index'), 'pages/rencana/_table')
    </div>
</div>
@endsection