@extends('layout.master_site')

@section('tittle')
Dashboard
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-large">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel mt-4">
                        <div class="panel-body">
                            <img src="
                            @if(auth()->user()->role == 'siswa')
                            {{ auth()->user()->siswa->getAvatar() }}
                            @endif" class="mt-2" width="100" height="100" alt="">
                            <h3>{{ auth()->user()->name }}</h3>
                            <h3>{{ $siswa->nama }}</h3>

                        </div>
                    </div>
                    <div class="panel mt-2">
                        <div class="panel-body">
                            <div class="card-deck">
                                <div class="card col-sm-4">
                                    <div class="card-body">
                                        <a href="{{ route('edit.siswa', auth()->user()->id) }}">
                                            <h5 style="color: black;"><i class="fas fa-edit" style="color: black;"></i>
                                                Edit</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="card col-sm-4">
                                    <div class="card-body">
                                        <a href="{{ route('site.logout') }}">
                                            <h5 style="color: black;"><i class="fas fa-sign-out-alt"
                                                    style="color: black;"></i> Logout</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
