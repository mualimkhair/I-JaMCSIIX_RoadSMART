<div class="col-lg-12">
    <form class="row g-3 justify-content-center"
        action="{{ request()->routeIs('jalan.create') ? route('jalan.store') : route('jalan.update', $jalan->id) }}"
        method="post">
        @csrf
        @if (request()->routeIs('jalan.edit'))
        @method('put')
        <input type="hidden" value="{{ $jalan->id }}" class="form-control rounded-pill" id="id" name="id">
        @endif
        <div class="col-lg-12">
            <label for="map" class="form-label">Peta</label>
            <div id="map" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-lg-12 d-grid">
            <button type="button" id="hapus-titik" class="btn btn-info rounded-pill text-white">
                <i class="bi bi-x-circle-fill"></i> Hapus Titik
            </button>
        </div>
        <div class="col-lg-12 d-none">
            <input readonly type="hidden" value="{{ old('lokasi', $jalan->lokasi) }}" class="form-control rounded-pill"
                id="lokasi" name="lokasi">
        </div>
        <div class="col-lg-10">
            <label for="nama_jalan" class="form-label">Nama Jalan</label>
            <input readonly type="text" value="{{ old('nama_jalan', $jalan->nama_jalan) }}"
                @class([ 'form-control rounded-pill' , 'is-invalid'=> $errors->has('nama_jalan'),
            ]) id="nama_jalan" name="nama_jalan">
        </div>
        <div class="col-lg-2">
            <label for="panjang" class="form-label">Panjang</label>
            <div class="input-group">
                <input readonly type="text" value="{{ old('panjang', $jalan->panjang) }}" id="panjang" name="panjang"
                    @class([ 'form-control rounded-start-pill' , 'is-invalid'=> $errors->has('panjang'),
                ])>
                <span class="input-group-text rounded-end-pill bg-white border-start-0">KM</span>
            </div>
        </div>
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <a href="{{ route('jalan.index') }}" class="btn btn-lg btn-danger rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            @if (request()->routeIs('jalan.edit'))
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