@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Baru</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="app-content content ">
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
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Baru</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        @if (!$student)
                                            <div class="card">
                                                <form action="{{ route('siswa.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="no_daftar">No. Daftar</label>
                                                                    <input type="text" name="no_daftar"
                                                                        value="{{ $kode }}" id="no_daftar"
                                                                        class="form-control @error('no_daftar') is-invalid @enderror"
                                                                        readonly>
                                                                    @error('no_daftar')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Lengkap</label>
                                                                    <input type="text" name="nama" id="nama"
                                                                        value="{{ auth()->user()->name }}"
                                                                        class="form-control @error('nama') is-invalid @enderror"
                                                                        readonly>
                                                                    @error('nama')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jk">Jenis Kelamin</label>
                                                                    <select name="jk" id="jk"
                                                                        class="form-control @error('jk') is-invalid @enderror custom-select"
                                                                        required>
                                                                        <option disabled selected>Pilih Jenis Kelamin
                                                                        </option>
                                                                        <option value="1">Laki - Laki</option>
                                                                        <option value="0">Perempuan</option>
                                                                    </select>
                                                                    @error('jk')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea name="alamat" id="alamat"
                                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                                        required></textarea>
                                                                    @error('alamat')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="agama">Agama</label>
                                                                    <input type="text" name="agama" id="agama"
                                                                        class="form-control @error('agama') is-invalid @enderror"
                                                                        required>
                                                                    @error('agama')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="asal_smp">Asal SMP</label>
                                                                    <input type="text" name="asal_smp" id="asal_smp"
                                                                        class="form-control @error('asal_smp') is-invalid @enderror"
                                                                        required>
                                                                    @error('asal_smp')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="jurusan">Jurusan</label>
                                                                    <select name="jurusan" id="jurusan"
                                                                        class="form-control @error('jurusan') is-invalid @enderror custom-select"
                                                                        required>
                                                                        <option disabled selected>Pilih Jurusan Anda
                                                                        </option>
                                                                        <option value="Rekayasa Perangkat Lunak">Rekayasa
                                                                            Perangkat Lunak</option>
                                                                        <option value="Tata Boga">Tata Boga</option>
                                                                        <option value="Tata Busana">Tata Busana</option>
                                                                        <option value="Multimedia">Multimedia</option>
                                                                    </select>
                                                                    @error('jurusan')
                                                                        <div class="invalid-feedback">
                                                                            <span>{{ $message }}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="table-responsive">
                                                <table id="table" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ 1 }}</td>
                                                            <td>{{ $student->nama }}</td>
                                                            <td>
                                                                <a href="{{ route('pdf') }}" target="_blank"
                                                                    class="btn btn-danger">PDF</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
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
