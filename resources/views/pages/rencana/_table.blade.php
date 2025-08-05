<div class="col-lg-12">
    <hr class="my-0">
</div>
<div class="col-lg-12">
    <table class="table table-light table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Jalan</th>
                <th>Nilai</th>
                <th>Presentase</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_rencana as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jalan->nama_jalan }}</td>
                <td>{{ $item->nilai }}</td>
                <td>
                    <div class="d-grid">
                        <a href="{{ route('rencana.edit', $item->id) }}" @class([ 'btn rounded-pill text-white'
                            , 'btn-danger'=> $item->presentase == 0, 'btn-warning' => $item->presentase > 0 &&
                            $item->presentase < 90, 'btn-success'=>$item->presentase >= 90 && $item->presentase
                                <=100,])>
                                    {{ $item->presentase }} %
                        </a>
                    </div>
                </td>
                <td>
                    <div class="d-grid">
                        <button type="button" class="btn btn-info rounded-pill text-white" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $loop->iteration }}">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('modal')
@foreach ($data_rencana as $item)
<div class="modal fade" id="modal-{{ $loop->iteration }}" tabindex="-1"
    aria-labelledby="modal-{{ $loop->iteration }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded-0 p-4">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 justify-content-center">
                    <div class="col-lg-12">
                        {{-- Koordinat dimasukkan dalam atribut data-koordinat --}}
                        <div id="map-{{ $loop->iteration }}" data-koordinat='@json(json_decode($item->jalan->lokasi))'
                            data-presentase="{{ $item->presentase }}" style="height: 300px; width: 100%;">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <h5 class="card-title">Nama Jalan</h5>
                        <p class="card-text">{{ $item->jalan->nama_jalan }} KM</p>
                    </div>
                    <div class="col-lg-6 text-end">
                        <h5 class="card-title">Panjang</h5>
                        <p class="card-text">{{ $item->jalan->panjang }} KM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection