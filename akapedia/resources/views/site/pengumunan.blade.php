@extends('layout.master_site')
@section('tittle')
Pengumuman
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel mt-4">
                        <div class="panel-body">
                            <form action="#" method="GET" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="cari pengumuman">
                                    <span class="input-group-btn"><button type="button"
                                            class="btn btn-primary">Go</button></span>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            @foreach($artikel as $atl)
                            <h6><a style="color: black;" href="{{ route('site.artikel', $atl->slug) }}">{{ $atl->tittle }}</a></h6>
                            @endforeach
                            {{ $artikel->links() }}
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
