@extends('dashboard.layout.main')

@section('content')
    <button class="btn btn-info" data-bs-toggle="modal"
    data-bs-target="#modalTambah">
        <i class="fa-solid fa-plus me-2"></i>Tambah Game
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
                                <th>#</th>
                                <th>Nama Game</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>User</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>w</td>
                                <td>w</td>
                                <td>w</td>
                                <td>w</td>
                                <td>w</td>
                                <td>w</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit">
                                        <i class="fa-regular fa-pen-to-square fa-lg"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus">
                                        <i class="fa-regular fa-trash-can fa-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{--  end tables  --}}

                </div>
            </div>
        </div>
    </div>

    {{-- hapus modal --}}
    <div class="modal fade" id="modalHapus" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p class="fs-6">Apakah anda yakin akan menghapus Game
                            <b>nama game</b>?
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

    {{-- Tambah Modal --}}
    <div class="modal fade" id="modalTambah" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Game</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="floatingInput" placeholder="Valorant">
                            <label for="floatingInput">Nama Game</label>
                        </div>
                        <select class="form-select mb-3" name="role" id="role">
                            <option selected disabled>Kategori</option>
                            @foreach ($kategoris as $kategori )
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Rp. 80.000">
                            <label for="floatingInput">Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Keterangan</label>
                        </div>
                        <select class="form-select mb-3" name="role" id="role">
                            <option selected disabled>User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Gambar</label>
                            </div>
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


    <script>
       $(":file").jfilestyle({text: "Gambar"});
    </script>

@endsection
