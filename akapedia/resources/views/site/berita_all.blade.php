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
                            <form action="#" method="GET" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="cari berita">
                                    <span class="input-group-btn"><button type="button"
                                            class="btn btn-primary">Go</button></span>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="card-deck">
                                @foreach($berita as $brt)
                                <div class="card col-lg-3 col-sm-3">
                                    <img src="{{ $brt->getAvatar() }}" class="card-img-top" alt="{{ $brt->thumbnail }}" width="100" height="100">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('berita.link', $brt->slug) }}" style="color: black;">{{ $brt->title }}</a></h5>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $brt->created_at->format('D, d M Y') }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{ $berita->links() }}
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
