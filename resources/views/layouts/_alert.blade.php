@if (session()->has('gagal') || $errors->any())
    <section class="py-1 alert alert-danger text-lg-end text-center rounded-4">
        <div @class([
            'container',
            'text-center' => request()->routeIs('auth.masuk'),
        ])>
            @forelse ($errors->all() as $error)
                <em>{{ $error }}</em>
                <br>
            @empty
                <em>{{ session('gagal') }}</em>
            @endforelse
        </div>
    </section>
@elseif (session()->has('berhasil'))
    <section class="py-1 alert alert-success text-lg-end text-center rounded-4">
        <div @class([
            'container',
            'text-center' => request()->routeIs('auth.masuk'),
        ])>
            <em>{{ session('berhasil') }}</em>
        </div>
    </section>
@endif
