<div class="col-lg-12">
    <form class="row g-3 justify-content-center" action="{{ route('rencana.update', $rencana->id) }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" value="{{ $rencana->id }}" class="form-control rounded-pill" id="id" name="id">
        <div class="col-lg-12">
            {{-- <div id="map" style="height: 300px; width: 100%;"
                data-koordinat='@json(json_decode($rencana->jalan->lokasi))'></div> --}}
            <div id="map" style="height: 300px; width: 100%;"
                data-koordinat='@json(json_decode($rencana->jalan->lokasi))'
                data-presentase="{{ $rencana->presentase }}">
            </div>
        </div>
        <div class="col-lg-6">
            <h5 class="card-title">Nama Jalan</h5>
            <p class="card-text">{{ $rencana->jalan->nama_jalan }} KM</p>
        </div>
        <div class="col-lg-6 text-end">
            <h5 class="card-title">Panjang</h5>
            <p class="card-text">{{ $rencana->jalan->panjang }} KM</p>
        </div>
        <div class="col-lg-12">
            <label for="presentase" class="form-label">Presentase</label>
            <div class="input-group">
                <input type="number" min="0" step="1" value="{{ old('presentase', $rencana->presentase) }}"
                    id="presentase" name="presentase" @class([ 'form-control rounded-start-pill' , 'is-invalid'=>
                $errors->has('presentase')
                ])>
                <span class="input-group-text rounded-end-pill bg-white border-start-0">%</span>
            </div>
        </div>
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <a href="{{ route('rencana.index') }}" class="btn btn-lg btn-danger rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <button type="submit" class="text-white btn btn-lg btn-warning rounded-pill">
                    <i class="bi bi-floppy-fill"> Simpan</i>
                </button>
            </div>
        </div>
    </form>

</div>