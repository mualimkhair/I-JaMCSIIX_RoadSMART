@extends('layouts/_main')
@section('main')
<div class="col-lg-5">
    <div class="p-lg-5 p-3">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <img src="{{ asset('img/sigi.png') }}" alt="#" class="img-fluid" style="max-width: 50px;">
        </div>
        <p class="fs-3 text-center mb-3">Masuk</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="row g-3 justify-content-end">
                <div class="col-lg-12">
                    <hr class="my-0">
                </div>
                <div class="col-lg-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" @class([ 'form-control rounded-pill form-control' , 'is-invalid'=>
                    $errors->has('email'),
                    ]) id="email" name="email">
                </div>
                <div class="col-lg-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" @class([ 'form-control rounded-pill form-control' , 'is-invalid'=>
                    $errors->has('password'),
                    ]) id="password" name="password">
                </div>
                <div class="col-lg-12">
                    <hr class="my-0">
                </div>
                <div class="col-lg-12">
                    <div class="d-flex">
                        <div class="btn-group flex-fill">
                            <a href="{{ route('index') }}" class="btn btn-lg rounded-start-pill btn-danger text-white">
                                <i class="bi bi-backspace-fill"> KEMBALI</i></a>
                            <button type="submit" class="btn btn-lg rounded-end-pill btn-success text-white">
                                <i class="bi bi-door-open-fill"> MASUK</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection