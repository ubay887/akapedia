@extends('layout.master_dashboard')

@section('tittle')
Siswa
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $siswa->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $siswa->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" value="{{ $siswa->password }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="-" @if($siswa->jenis_kelamin == '-') selected @endif >---</option>
                                    <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif >Laki-laki</option>
                                    <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif >Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="-" @if($siswa->agama == '-') selected @endif >---</option>
                                    <option value="Islam" @if($siswa->agama == 'Islam') selected @endif >Islam</option>
                                    <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif >Kristen</option>
                                    <option value="Katolik" @if($siswa->agama == 'Katolik') selected @endif >Katolik</option>
                                    <option value="Budha" @if($siswa->agama == 'Budha') selected @endif >Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $siswa->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name="no_tlp" class="form-control" class="form-control" value="{{ $siswa->no_tlp }}">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            @if(auth()->user()->role == 'kepala sekolah')
                            <div class="footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                            @elseif(auth()->user()->role == 'tu')
                            <div class="footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                            @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="panel">
                        <div class="panel-body">
                            <img src="{{ $siswa->getAvatar() }}" width="100" height="100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
