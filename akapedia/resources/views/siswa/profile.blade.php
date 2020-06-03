@extends('layout.master_dashboard')

@section('tittle')
Profile
@endsection

@section('main')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{ $siswa->getAvatar() }}" width="100" height="100" class="img-circle"
                                    alt="Avatar">
                                <h3 class="name">{{ $siswa->nama }}</h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        45 <span>Projects</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Basic Info</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin <span>{{ $siswa->jenis_kelamin }}</span></li>
                                    <li>Agama <span>{{ $siswa->agama }}</span></li>
                                    <li>Email <span>{{ $siswa->email }}</span></li>
                                    <li>Alamat <span>{{ $siswa->alamat }}</span></li>
                                    <li>No Telp <span>{{ $siswa->no_tlp }}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <h4 class="heading">Nilai {{ $siswa->nama }}</h4>
                        <div class="table-responsive">
                            @if(auth()->user()->role == 'kepala sekolah')
                            <button type="button" class="btn btn-primary heading" data-toggle="modal"
                                data-target="#exampleModal" style="float: right;">
                                <i class="lnr lnr-plus-circle"></i> Nilai
                            </button>
                            @elseif(auth()->user()->role == 'guru')
                            <button type="button" class="btn btn-primary heading" data-toggle="modal"
                                data-target="#exampleModal" style="float: right;">
                                <i class="lnr lnr-plus-circle"></i> Nilai
                            </button>
                            @endif
                            <table class="table table-bordered table-hover table-striped ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>MataPelajaran</th>
                                        <th>Guru</th>
                                        <th>Semester</th>
                                        <th>Nilai</th>
                                        @if(auth()->user()->role == 'kepala sekolah')
                                        <th colspan="2">Aksi</th>
                                        @elseif(auth()->user()->role == 'guru')
                                        <th colspan="2">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($siswa->mapel as $mapel)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $mapel->kode }}</td>
                                        <td>{{ $mapel->nama }}</td>
                                        <td>{{ $mapel->guru->nama }}</td>
                                        <td>{{ $mapel->pivot->semester }}</td>
                                        <td>{{ $mapel->pivot->nilai }}</td>
                                        @if(auth()->user()->role == 'kepala sekolah')
                                        <td><a href="#" class="delete" siswaId="{{ $siswa->id }}"
                                                mapelId="{{ $mapel->id }}"><i class="lnr lnr-trash"></i></a></td>
                                        @elseif(auth()->user()->role == 'guru')
                                        <td><a href="#" class="delete" siswaId="{{ $siswa->id }}"
                                                mapelId="{{ $mapel->id }}"><i class="lnr lnr-trash"></i></a></td>
                                        @endif
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/data_siswa/{{ $siswa->id }}/nilai" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                    <select name="mapel_id" id="" class="form-control">
                        @foreach($matapelajaran as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                    <select name="semester" id="" class="form-control">
                        <option value="Semester 1">Semester 1</option>
                        <option value="Semester 2">Semester 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nilai</label>
                    <input type="text" name="nilai" id="" placeholder="Nilai" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            var siswa_id = $(this).attr('siswaId');
            var mapel_id = $(this).attr('mapelId');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Nilai Siswa !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_siswa/" + siswa_id + "/" + mapel_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });
</script>
@endsection