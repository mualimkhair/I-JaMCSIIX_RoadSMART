<div class="col-lg-12">
    <form class="row g-3 justify-content-center"
        action="{{ request()->routeIs('akun.create') ? route('akun.store') : route('akun.update', $user->id) }}"
        method="post">
        @csrf
        @if (request()->routeIs('akun.edit'))
        @method('put')
        <input type="hidden" value="{{ $user->id }}" class="form-control rounded-pill" id="id" name="id">
        @endif
        <div class="col-lg-12">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input autofocus type="text" value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                @class([ 'form-control rounded-pill' , 'is-invalid'=> $errors->has('nama_lengkap'),
            ]) id="nama_lengkap" name="nama_lengkap">
        </div>
        <div class="col-lg-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ old('email', $user->email) }}" @class([ 'form-control rounded-pill'
                , 'is-invalid'=> $errors->has('email'),
            ]) id="email"
            name="email">
        </div>
        <div class="col-lg-12">
            <label for="role" class="form-label">Role</label>
            @foreach ($list_role as $item)
            <div class="form-check">
                <input @class([ 'form-check-input rounded-pill' , 'is-invalid'=> $errors->has('role'),
                ]) type="radio" value="{{ $item }}"
                id="{{ $item }}" name="role" @checked(old('role', $user->role) == $item)>
                <label class="form-check-label" for="{{ $item }}">
                    {{ $item }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <a href="{{ route('akun.index') }}" class="btn btn-lg btn-danger rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            @if (request()->routeIs('akun.edit'))
            <div class="d-grid">
                <button type="submit" class="text-white btn btn-lg btn-warning rounded-pill">
                    <i class="bi bi-floppy-fill"> Simpan</i>
                </button>
            </div>
            @else
            <div class="d-grid">
                <button type="submit" class="text-white btn btn-lg btn-success rounded-pill">
                    <i class="bi bi-plus-circle-fill"> Tambah</i>
                </button>
            </div>
            @endif
        </div>
    </form>

</div>