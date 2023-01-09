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
                                <th>Nama Kategori</th>
                                <th>Kode Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p class="fs-6">Apakah anda yakin akan menghapus kategori
                            <b>nama kategori</b>?
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
    <div class="modal fade" id="modalTambah" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="floatingInput" placeholder="Action">
                            <label for="floatingInput">Nama Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="floatingInput" placeholder="AC">
                            <label for="floatingInput">Kode Kategori</label>
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
    {{-- End Edit modal --}}


    <script>
       $(":file").jfilestyle({text: "Gambar"});
    </script>

@endsection
