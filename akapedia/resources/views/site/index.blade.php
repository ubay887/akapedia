@extends('layout.master_site')

@section('titte')
Akademi
@endsection

@section('main')

<div class="main">
    <div class="main-content">
        <div class="container-large">
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($promosi->take(3) as $pr)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <a href="{{ route('promosi.link', $pr->slug) }}"><img class="d-block w-100"  src="{{ $pr->getAvatar() }}" alt="{{ $pr->thumbnail }}" width="1100" height="500"></a>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel mt-4">
                        <div class="panel-heading">
                            <h3 class="m-0" style="color: black;">Pengumuman</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($artikel as $atl)
                            <h6><a style="color: black;"
                                    href="{{ route('site.artikel', $atl->slug) }}">{{ $atl->tittle }}</a></h6>
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <h6><a class="btn btn-primary" style="color: white;" href="{{ route('pengumuman.all') }}">Selengkapnya</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel mt-4">
                        <div class="panel-heading">
                            <h3 class="m-0" style="color: black;">Berita</h3>
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
                        <div class="panel-footer">
                            <h6><a class="btn btn-primary" href="{{ route('berita.all') }}" style="color: white;">Selengkapnya</a></h6>
                        </div>
                    </div>
                </div>
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

@section('js')
<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
@endsection
