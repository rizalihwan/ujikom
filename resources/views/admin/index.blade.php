@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header my-2">
                                    <h4 class="card-title">Data Siswa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-light table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No. Daftar</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Agama</th>
                                                    <th>Asal SMP</th>
                                                    <th>Jurusan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>
                                                            <span class="badge badge-success">
                                                                {{ $student->no_daftar }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $student->nama }}</td>
                                                        <td>{{ $student->GenderStatus }}</td>
                                                        <td>{{ $student->alamat }}</td>
                                                        <td>{{ $student->agama }}</td>
                                                        <td>{{ $student->asal_smp }}</td>
                                                        <td>{{ $student->jurusan }}</td>
                                                        <td>
                                                            <a href="{{ route('siswa.edit', $student->id) }}"
                                                                class="btn btn-warning" style="margin-bottom: 3px;">Edit</a>
                                                            <button type="submit"
                                                                onclick="deleteStudent('{{ $student->id }}')"
                                                                class="btn btn-danger">Delete</button>
                                                            <form action="{{ route('siswa.destroy', $student->id) }}"
                                                                method="post" id="DeleteStudent{{ $student->id }}">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        function deleteStudent(id) {
            Swal.fire({
                title: 'Apakah yakin data akan di hapus?',
                text: "Anda tidak dapat mengembalikannya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Menghapus data registrasi...",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteStudent${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
            })
        }

    </script>
@endpush
