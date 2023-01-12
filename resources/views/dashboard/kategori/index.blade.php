@extends('dashboard.layout.main')

@section('content')
    <div class="row">
        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus me-2"></i>Tambah Kategori
    </button>
    <div class="row">
        <div class="col">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    {{-- tables --}}
                    <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                        style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Kode Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>{{ $kategori->kode_kategori }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $loop->iteration }}">
                                            <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus{{ $loop->iteration }}">
                                            <i class="fa-regular fa-trash-can fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                {{-- hapus modal --}}
                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('list-kategori.destroy', $kategori->id) }}" method="post">
                                                @method('delete')
                                                @csrf

                                                <div class="modal-body">
                                                    <p class="fs-6">Apakah anda yakin akan menghapus kategori
                                                        <b>{{ $kategori->kategori}}</b>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End hapus modal --}}

                                {{-- Edit Modal --}}
                                <div class="modal fade" id="modalEdit{{ $loop->iteration }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('list-kategori.update', $kategori->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="hidden" name="id" value="{{ $kategori->id }}">
                                                        <input type="text"
                                                            class="form-control @error('kategori') is-invalid @enderror"
                                                            id="kategori" name="kategori"
                                                            value="{{ old('kategori', $kategori->kategori) }}" autofocus required>
                                                        <label for="kategori">Kategori</label>
                                                        @error('kategori')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @error('kode_kategori') is-invalid @enderror"
                                                            id="kode_kategori" name="kode_kategori"
                                                            value="{{ old('kode_kategori', $kategori->kode_kategori) }}" required>
                                                        <label for="kode_kategori">Kode Kategori</label>
                                                        @error('kode_kategori')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Edit modal --}}

                                {{-- Tambah Modal --}}
                                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('list-kategori.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('kategori') is-invalid @enderror"
                                                            id="kategori" name="kategori" placeholder="Action">
                                                        <label for="kategori">Nama Kategori</label>
                                                        @error('kategori')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('kode_kategori') is-invalid @enderror"
                                                            id="kode_kategori" name="kode_kategori" placeholder="AC">
                                                        <label for="kode_kategori">Kode Kategori</label>
                                                        @error('kode_kategori')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Tambah modal --}}
                                @endforeach
                            </tbody>

                    </table>
                    {{--  end tables  --}}

                </div>
            </div>
        </div>
    </div>
@endsection
