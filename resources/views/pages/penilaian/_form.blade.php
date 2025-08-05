<div class="col-lg-12">
    <form class="row g-3 justify-content-center"
        action="{{ request()->routeIs('penilaian.create') ? route('penilaian.store') : route('penilaian.update', $penilaian->id) }}"
        method="post">
        @csrf
        @if (request()->routeIs('penilaian.edit'))
        @method('put')
        <input type="hidden" value="{{ $penilaian->id }}" class="form-control rounded-pill" id="id" name="id">
        @endif
        <div class="col-lg-12">
            <label for="jalan_id" class="form-label">Jalan</label>
            <select autofocus @disabled(count($list_jalan_id)==0) name="jalan_id" id="jalan_id"
                @class([ 'form-control rounded-pill' , 'is-invalid'=> $errors->has('jalan_id'),
                ])>
                <option hidden selected></option>
                @foreach ($list_jalan_id as $item)
                <option value="{{ $item->id }}" @selected(old('jalan_id', $penilaian->id) == $item->id)>
                    {{ $item->nama_jalan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-12">
            <div class="row g-3 justify-content-center">
                @foreach ($list_kriteria_id as $item)
                <div @class([ 'col-12'=> count($list_kriteria_id) === 1,
                    'col-md-6' => count($list_kriteria_id) > 1,
                    ])>
                    <label for="bobot_{{ $item->id }}" class="form-label">{{ $item->nama_kriteria }}</label>
                    <div class="input-group">
                        <input type="number" min="1" max="100" step="1"
                            value="{{ old('bobot.'.$item->id, request()->routeIs('penilaian.edit') ? optional($penilaian->penilaian->where('kriteria_id', $item->id)->first())->bobot : null) }}"
                            id="bobot_{{ $item->id }}" name="bobot[{{ $item->id }}]"
                            @class([ 'form-control rounded-start-pill' , 'is-invalid'=>
                        $errors->has('bobot.'.$item->id),
                        ])>
                        <span class="input-group-text rounded-end-pill bg-white border-start-0">%</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-12">
            <hr class="my-0">
        </div>
        <div class="col-lg-6">
            <div class="d-grid">
                <a href="{{ route('penilaian.index') }}" class="btn btn-lg btn-danger rounded-pill text-white">
                    <i class="bi bi-backspace-fill"></i></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            @if (request()->routeIs('penilaian.edit'))
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