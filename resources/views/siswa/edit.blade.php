@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
                                <h4 class="card-title">Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <form action="{{ route('siswa.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="agama">Agama</label>
                                                        <input type="text" name="agama" id="agama"
                                                            class="form-control @error('agama') is-invalid @enderror"
                                                            value="{{ $student->agama }}" required>
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
                                                            value="{{ $student->asal_smp }}"
                                                            class="form-control @error('asal_smp') is-invalid @enderror" required>
                                                        @error('asal_smp')
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
                                                            <option value="1" @if ($student->jk == 1) selected @endif>Laki - Laki</option>
                                                            <option value="0" @if ($student->jk == 0) selected @endif>Perempuan</option>
                                                        </select>
                                                        @error('jk')
                                                            <div class="invalid-feedback">
                                                                <span>{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jurusan">Jurusan</label>
                                                        <select name="jurusan" id="jurusan"
                                                            class="form-control @error('jurusan') is-invalid @enderror custom-select"
                                                            required>
                                                            <option @if ($student->jurusan == 'Rekayasa Perangkat Lunak') selected @endif>Rekayasa Perangkat Lunak
                                                            </option>
                                                            <option @if ($student->jurusan == 'Tata Boga') selected @endif>Tata Boga</option>
                                                            <option @if ($student->jurusan == 'Tata Busana') selected @endif>Tata Busana</option>
                                                            <option @if ($student->jurusan == 'Multimedia') selected @endif>Multimedia</option>
                                                        </select>
                                                        @error('jurusan')
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
                                                            required>{{ $student->alamat }}</textarea>
                                                        @error('alamat')
                                                            <div class="invalid-feedback">
                                                                <span>{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @if (auth()->user()->role == 'admin')
                                                <a href="{{ route('admin.index') }}" class="btn btn-danger">Kembali</a>
                                            @else
                                                <a href="{{ route('pendaftar') }}" class="btn btn-danger">Kembali</a>
                                            @endif
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Baru') }}</div>

                    <div class="card-body">
                        <div class="card">
                            <form action="{{ route('siswa.update', $student->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input type="text" name="agama" id="agama"
                                                    class="form-control @error('agama') is-invalid @enderror"
                                                    value="{{ $student->agama }}" required>
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
                                                    value="{{ $student->asal_smp }}"
                                                    class="form-control @error('asal_smp') is-invalid @enderror" required>
                                                @error('asal_smp')
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
                                                    <option value="1" @if ($student->jk == 1) selected @endif>Laki - Laki</option>
                                                    <option value="0" @if ($student->jk == 0) selected @endif>Perempuan</option>
                                                </select>
                                                @error('jk')
                                                    <div class="invalid-feedback">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <select name="jurusan" id="jurusan"
                                                    class="form-control @error('jurusan') is-invalid @enderror custom-select"
                                                    required>
                                                    <option @if ($student->jurusan == 'Rekayasa Perangkat Lunak') selected @endif>Rekayasa Perangkat Lunak
                                                    </option>
                                                    <option @if ($student->jurusan == 'Tata Boga') selected @endif>Tata Boga</option>
                                                    <option @if ($student->jurusan == 'Tata Busana') selected @endif>Tata Busana</option>
                                                    <option @if ($student->jurusan == 'Multimedia') selected @endif>Multimedia</option>
                                                </select>
                                                @error('jurusan')
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
                                                    required>{{ $student->alamat }}</textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @if (auth()->user()->role == 'admin')
                                        <a href="{{ route('admin.index') }}" class="btn btn-danger">Kembali</a>
                                    @else
                                        <a href="{{ route('pendaftar') }}" class="btn btn-danger">Kembali</a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
