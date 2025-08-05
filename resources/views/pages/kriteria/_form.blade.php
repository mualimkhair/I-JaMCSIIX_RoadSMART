<div class="col-lg-12">
    <form class="row g-3 justify-content-center"
        action="{{ request()->routeIs('kriteria.create') ? route('kriteria.store') : route('kriteria.update', $kriteria->id) }}"
        method="post">
        @csrf
        @if (request()->routeIs('kriteria.edit'))
        @method('put')
        <input type="hidden" value="{{ $kriteria->id }}" class="form-control rounded-pill" id="id" name="id">
        @endif
        <div class="col-lg-9">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input autofocus type="text" value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}"
                @class([ 'form-control rounded-pill' , 'is-invalid'=> $errors->has('nama_kriteria'),
            ]) id="nama_kriteria" name="nama_kriteria">
        </div>
        <div class="col-lg-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" min="0" max="1" step="0.1" value="{{ old('bobot', $kriteria->bobot) }}"
                @class([ 'form-control rounded-pill' , 'is-invalid'=> $errors->has('bobot'),
            ]) id="bobot" name="bobot">
        </div>
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <a href="{{ route('kriteria.index') }}" class="btn btn-lg btn-danger rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            @if (request()->routeIs('kriteria.edit'))
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