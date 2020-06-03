@extends('layout.master_site')

@section('tittle')
Siswa
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-large">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel mt-4">
                        <div class="panel-body">
                            <form action="{{ route('update.siswa', auth()->user()->siswa->id) }}"
                                enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control"
                                        value="{{ auth()->user()->siswa->nama }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ auth()->user()->siswa->email }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control"
                                        value="{{ auth()->user()->siswa->password }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="-" @if(auth()->user()->siswa->jenis_kelamin == '-') selected
                                            @endif >---</option>
                                        <option value="Laki-laki" @if(auth()->user()->siswa->jenis_kelamin ==
                                            'Laki-laki') selected @endif >Laki-laki</option>
                                        <option value="Perempuan" @if(auth()->user()->siswa->jenis_kelamin ==
                                            'Perempuan') selected @endif >Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-" @if(auth()->user()->siswa->agama == '-') selected @endif >---
                                        </option>
                                        <option value="Islam" @if(auth()->user()->siswa->agama == 'Islam') selected
                                            @endif >Islam</option>
                                        <option value="Kristen" @if(auth()->user()->siswa->agama == 'Kristen') selected
                                            @endif >Kristen</option>
                                        <option value="Katolik" @if(auth()->user()->siswa->agama == 'Katolik') selected
                                            @endif >Katolik</option>
                                        <option value="Budha" @if(auth()->user()->siswa->agama == 'Budha') selected
                                            @endif >Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="10"
                                        class="form-control">{{ auth()->user()->siswa->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="panel mt-4">
                        <div class="panel-body">
                            <img src="{{ auth()->user()->siswa->getAvatar() }}" width="100" height="100" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@foreach($about as $ab)
<h5 style="color: white;"><i class="fab fa-instagram" style="color: white;"></i><span> {{ $ab->instagram }}</span></h5>
<h5 style="color: white;"><i class="fab fa-facebook"></i><span> {{ $ab->facebook }}</span></h5>
<h5 style="color: white;"><i class="fab fa-whatsapp"></i><span> {{ $ab->no_tlp }}</span></h5>
@endforeach
@endsection
