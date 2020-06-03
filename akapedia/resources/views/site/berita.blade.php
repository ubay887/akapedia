@extends('layout.master_site')

@section('tittle')
Berita
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
                            <h4 class="text-right">{{ $berita->created_at->format('D, d M Y') }}</h4><br>
                            <img src="{{ $berita->getAvatar() }}" width="300" height="300" style="display: block; margin:auto" alt=""><br>
                            <h2 style="color: black;" class="text-center">{{ $berita->title }}</h2>
                        </div>
                        <div class="panel-body">
                            <h3 class="" style="color: black;">{!! $berita->content !!}</h3>
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
