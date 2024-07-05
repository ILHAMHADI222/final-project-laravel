@extends('layouts.navbar')
@extends('layouts.app')

@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4 fw-bold">Masukan Jarak Ke Sekolah Yang Anda Pilih</h2>
    <hr class="divider">
    <div class="container">
        <div class="row">
            @if($selectedSchools->isEmpty())
                <p class="text-center">Tidak ada sekolah yang dipilih</p>
            @else
                <form action="{{ route('simpanJarak') }}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach($selectedSchools as $school)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="card h-100 shadow-sm" style="background-color: #CF0723; color: white;">
                                    <a href="{{ $school->link_image }}" title="{{ $school->nama_sekolah }}">
                                        <img class="card-img-top img-fluid" src="{{ $school->link_image }}" alt="{{ $school->nama_sekolah }}">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $school->nama_sekolah }}</h5>
                                        <p class="card-text">{{ $school->lokasi_sekolah }}</p>
                                        
                                        <div class="form-group">
                                            <label for="jarak_{{ $school->id_sekolah }}">Jarak</label>
                                            <input type="number" name="jarak[{{ $school->id_sekolah }}]" id="jarak_{{ $school->id_sekolah }}" class="form-control" value="{{ old('jarak.' . $school->id_sekolah) }}" required placeholder="Masukkan jarak bedasarkan(km)">
                                        </div>

                                        <input type="hidden" name="id_sekolah[{{ $school->id_sekolah }}]" value="{{ $school->id_sekolah }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container mt-4" style="margin-bottom: 2rem; padding-bottom: 1rem;">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <a href={{ route('user.index')}}  id="submitBtn1" class="btn btn-success">
                    <i class="fas fa-arrow-left fa-lg"></i> Back
                </a>
            </div>
            <div class="col-auto">
            <button type="submit" id="submitBtn1" class="btn btn-success">Simpan Semua</button>
            </div>
            </div>
                </form>
            @endif
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.2s;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    width: 100%;
    height: 250px;
    object-fit: cover;
}
</style>

@endsection
