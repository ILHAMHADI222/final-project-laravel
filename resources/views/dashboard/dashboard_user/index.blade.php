<!-- resources/views/dashboard/user_dashboard/index.blade.php -->
 <!-- resources/views/dashboard/user_dashboard/index.blade.php -->
@extends('Auth.dash')


@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4">Daftar Sekolah Menengah Kejuruan Swasta</h2>
    <hr class="divider">
    <a href="{{ route('user_dashboard.create') }}" class="btn btn-primary mb-4">Tambah Sekolah</a>
    <div class="container">
        <div class="row">
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ $portfolio->link_image }}" title="{{ $portfolio->nama_sekolah }}">
                            <img class="card-img-top img-fluid" src="{{ $portfolio->link_image }}" alt="{{ $portfolio->nama_sekolah }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $portfolio->nama_sekolah }}</h5>
                            <p class="card-text">{{ $portfolio->lokasi_sekolah }}</p>
                            <a href="{{ $portfolio->link_web }}" class="btn btn-primary" title="{{ $portfolio->nama_sekolah }}">Lihat Detail</a>
                            <a href="{{ route('user_dashboard.edit', $portfolio->id_sekolah) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user_dashboard.destroy', $portfolio->id_sekolah) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus sekolah ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
