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
        <i class="fa-solid fa-plus me-2"></i>Tambah User
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @php
                                            if ($user->role == 1) {
                                                $role = 'Admin';
                                            } elseif ($user->role == 2) {
                                                $role = 'Gamer';
                                            }
                                        @endphp
                                        {{ $role }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modalResetPassword{{ $loop->iteration }}">
                                            <i class="fa-regular fa-unlock-keyhole"></i>
                                        </button>
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
                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Game</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="fs-6">Apakah anda yakin akan menghapus Game
                                                        <b>{{ $user->name }}</b>?
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
                                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Udin"
                                                            value="{{ old('name') }}" autofocus required>
                                                        <label for="name">Nama</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username" placeholder="Admin"
                                                            value="{{ old('username') }}" required>
                                                        <label for="username">Username</label>
                                                        @error('username')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            id="password" name="password" placeholder="password"
                                                            value="{{ old('password') }}" required>
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <select class="form-select" name="role" id="role">
                                                        <option selected>Role</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Gamer</option>
                                                    </select>
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

                                {{-- Edit Modal --}}
                                <div class="modal fade" id="modalEdit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('user.update', $user->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name" placeholder="Udin"
                                                            value="{{ old('name', $user->name) }}" autofocus required>
                                                        <label for="name">Nama</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="name"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username" placeholder="Admin"
                                                            value="{{ old('username', $user->username) }}" required>
                                                        <label for="username">Username</label>
                                                        @error('username')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <select class="form-select" name="role" id="role">
                                                        <option selected>Role</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Gamer</option>
                                                    </select>
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

                                {{-- Modal Reset Password --}}
                                <div class="modal fade" id="modalResetPassword{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="/dashboard/user/list-user/reset-password" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password Baru</label>
                                                        <div id="pwd1" class="input-group">
                                                            <input type="password"
                                                                class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                                name="password" id="password" value="" required>
                                                            <span class="input-group-text cursor-pointer">
                                                                <i class="fa-regular fa-eye-slash"
                                                                    id="togglePassword"></i>
                                                            </span>
                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="password2" class="form-label">Konfirmasi Password
                                                            Baru</label>
                                                        <div id="pwd2" class="input-group">
                                                            <input type="password"
                                                                class="form-control border-end-0 @error('password2') is-invalid @enderror"
                                                                name="password2" id="password2" value="" required>
                                                            <span class="input-group-text cursor-pointer">
                                                                <i class="fa-regular fa-eye-slash"
                                                                    id="togglePassword"></i>
                                                            </span>
                                                            @error('password2')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- / Modal Reset Password --}}
                            @endforeach
                        </tbody>
                    </table>
                    {{--  end tables  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
