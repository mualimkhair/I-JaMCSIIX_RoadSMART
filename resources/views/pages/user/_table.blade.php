<div class="col-lg-12">
    <hr class="my-0">
</div>
<div class="col-lg-12">
    <table class="table table-light table-bordered table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Ubah</th>
                <th>Hapus</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                {{-- <th>Verifikasi Email</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data_user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <div class="d-grid">
                        <a href="{{ route('akun.edit', $item->id) }}" class="btn btn-warning rounded-pill text-white">
                            <i class="bi bi-pen-fill"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('akun.destroy', $item->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger rounded-pill text-white"
                                onclick="return confirm('Apakah data akan dihapus?')">
                                <i class="bi bi-trash2-fill"></i>
                            </button>
                        </div>
                    </form>
                </td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                {{-- <td>{{ $item->email_verified_at }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>