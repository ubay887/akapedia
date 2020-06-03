@extends('layout.master_site')

@section('tittle')
Akademik
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-large">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel mt-4">
                        <div class="panel-heading">
                            <h3>Kelas</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($kelas as $kls)
                            <h5><a href="{{ route('site.kelas', $kls->id) }}" style="color: black;">{{ $kls->kelas }}</a></h5>
                            @endforeach
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
