@extends('layouts.app')

@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4">Daftar Sekolah Menengah Kejuruan Swasta</h2>
    <hr class="divider">
    <div class="container">
        <div class="row">
            @if($portfolios->isEmpty())
                <p class="text-center">No data found</p>
            @else
                @foreach($portfolios as $portfolio)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ $portfolio->link_image }}" title="{{ $portfolio->nama_sekolah }}">
                                <img class="card-img-top img-fluid" src="{{ $portfolio->link_image }}" alt="{{ $portfolio->nama_sekolah }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $portfolio->nama_sekolah }}</h5>
                                <p class="card-text">{{ $portfolio->lokasi_sekolah }}</p>
                                <a href="{{ $portfolio->link_web }}" class="btn btn-primary" title="Lihat Detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
