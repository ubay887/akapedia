@extends('layout.master_site')

@section('tittle')
Artikel
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel mt-4">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">{{ $artikel->tittle }}</h3>
                            <h6 style="float: right;">{{ $artikel->created_at->format('D, d M Y') }}</h6><br>
                        </div>
                        <div class="panel-body">
                            <h5>{!! $artikel->content !!}</h5>
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
