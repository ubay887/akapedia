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
                                <img src="{{ auth()->user()->pegawai->getAvatar() }}" width="100" height="100" class="img-circle"
                                    alt="Avatar">
                                <h3 class="name">{{ auth()->user()->pegawai->nama }}</h3>
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
                                    <li>Jenis Kelamin <span>{{ auth()->user()->pegawai->jenis_kelamin }}</span></li>
                                    <li>Agama <span>{{ auth()->user()->pegawai->agama }}</span></li>
                                    <li>Email <span>{{ auth()->user()->pegawai->email }}</span></li>
                                    <li>Alamat <span>{{ auth()->user()->pegawai->alamat }}</span></li>
                                    <li>No Telp <span>{{ auth()->user()->pegawai->no_tlp }}</span></li>
                                    <li>Jabatan <span>{{ auth()->user()->pegawai->jabatan }}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="{{ route('profile.edit', auth()->user()->id) }}" class="btn btn-primary">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">

                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>


@endsection
