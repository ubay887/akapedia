@extends('layout.master_dashboard')

@section('tittle')
Siswa
@endsection

@section('main')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">Data Siswa</h3>
                            <div class="right">
                                <a href="{{ route('export_excel') }}" class="btn btn-primary sm">Excel</a>
                                <a href="{{ route('export_pdf') }}" class="btn btn-primary sm">PDF</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Rata-Rata Nilai</th>
                                            <th>Foto</th>
                                            @if(auth()->user()->role == 'kepala sekolah')
                                            <th colspan="2">Aksi</th>
                                            @elseif(auth()->user()->role == 'tu')
                                            <th colspan="2">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($data_siswa as $siswa)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ route('profile.siswa', $siswa->id) }}">{{ $siswa->nama }}</a>
                                            </td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ $siswa->agama }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->no_tlp }}</td>
                                            <td>{{ $siswa->rataNilai() }}</td>
                                            <td><img src="{{ $siswa->getAvatar() }}" width="50" height="50"></td>
                                            @if(auth()->user()->role == 'kepala sekolah')
                                            <td><a href="/data_siswa/{{ $siswa->id }}/edit"><i
                                                        class="lnr lnr-pencil"></i></a></td>
                                            <td><a href="#" class="delete" siswaid="{{ $siswa->id }}"><i
                                                        class="lnr lnr-trash"></i></a></td>
                                            @elseif(auth()->user()->role == 'tu')
                                            <td><a href="/data_siswa/{{ $siswa->id }}/edit"><i
                                                        class="lnr lnr-pencil"></i></a></td>
                                            <td><a href="#" class="delete" siswaid="{{ $siswa->id }}"><i
                                                        class="lnr lnr-trash"></i></a></td>
                                            @endif
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data_siswa->links() }}
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->role == 'kepala sekolah')
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tittle">
                                <h3 class="m-0 font-weight-bold text-primary">Tambah Siswa</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('create')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                        value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="-">---</option>
                                        <option value="Laki-laki"
                                            {{ (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block"
                                        style="color: red;">{{ $errors->first('jenis_kelamin') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-">---</option>
                                        <option value="Islam" {{ (old('Islam') == 'Islam') ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ (old('Kristen') == 'Kristen') ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Katolik" {{ (old('Katolik') == 'Katolik') ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="Budha" {{ (old('Budha') == 'Budha') ? 'selected' : '' }}>Budha
                                        </option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="10"
                                        placeholder="">{{ old('alamat') }}</textarea>
                                    @if($errors->has('alamat'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('no_tlp') ? 'has-error' : '' }}">
                                    <label for="">No Tlp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}"
                                        placeholder="No Tlp">
                                    @if($errors->has('no_tlp'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('no_tlp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                    @if($errors->has('avatar'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @elseif(auth()->user()->role == 'tu')
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tittle">
                                <h3 class="m-0 font-weight-bold text-primary">Tambah Siswa</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('create')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                        value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="-">---</option>
                                        <option value="Laki-laki"
                                            {{ (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block"
                                        style="color: red;">{{ $errors->first('jenis_kelamin') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-">---</option>
                                        <option value="Islam" {{ (old('Islam') == 'Islam') ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ (old('Kristen') == 'Kristen') ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Katolik" {{ (old('Katolik') == 'Katolik') ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="Budha" {{ (old('Budha') == 'Budha') ? 'selected' : '' }}>Budha
                                        </option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="10"
                                        placeholder="">{{ old('alamat') }}</textarea>
                                    @if($errors->has('alamat'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('no_tlp') ? 'has-error' : '' }}">
                                    <label for="">No Tlp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}"
                                        placeholder="No Tlp">
                                    @if($errors->has('no_tlp'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('no_tlp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                    @if($errors->has('avatar'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            var siswa_id = $(this).attr('siswaid');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Data Siswa !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_siswa/" + siswa_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });
</script>
@endsection
