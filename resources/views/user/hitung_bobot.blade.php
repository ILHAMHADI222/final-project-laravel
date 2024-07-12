@extends('layouts.navbar')
@extends('layouts.app')

@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4 fw-bold">Masukkan Bobot Penilaian Sekolah</h2>
    <hr class="divider">
    <div class="container">
        <div class="row">
            @if($selectedSchools->isEmpty())
                <p class="text-center">Tidak ada sekolah yang dipilih</p>
            @else
                <form action="{{ route('simpanBobot') }}" method="POST">
                    @csrf
                    <input type="hidden" name="selectedIds" value="{{ request()->input('selectedIds') }}">
                    
                    <!-- Single form for bobot input -->
                    <div class="form-group">
                        <label for="w1">Bobot untuk Jarak</label>
                        <select class="form-select mb-3" name="w1" id="w1" aria-label="w1">
                        <option disabled selected>Apakah Penting untuk Jarak ?</option>
                        <option value="1">Sangat Tidak Penting Dengan Point 1</option>
                            <option value="2">Tidak Penting Dengan Point 2 </option>
                            <option value="3">Cukup Penting Dengan Point 3</option>
                            <option value="4">Penting Dengan Point 4</option>
                            <option value="5">Sangat Penting Dengan Point 5</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="w2">Bobot untuk Akreditasi</label>
                        <select class="form-select mb-3" name="w2" id="w2" aria-label="w2">
                            <option disabled selected>Apakah Penting untuk Akreditasi ?</option>
                            <option value="1">Sangat Tidak Penting Dengan Point 1</option>
                            <option value="2">Tidak Penting Dengan Point 2 </option>
                            <option value="3">Cukup Penting Dengan Point 3</option>
                            <option value="4">Penting Dengan Point 4</option>
                            <option value="5">Sangat Penting Dengan Point 5</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="w3">Bobot untuk Fasilitas</label>
                        <select class="form-select mb-3" name="w3" id="w3" aria-label="w3">
                            <option disabled selected>Apakah Penting untuk Fasilitas ?</option>
                            <<option value="1">Sangat Tidak Penting Dengan Point 1</option>
                            <option value="2">Tidak Penting Dengan Point 2 </option>
                            <option value="3">Cukup Penting Dengan Point 3</option>
                            <option value="4">Penting Dengan Point 4</option>
                            <option value="5">Sangat Penting Dengan Point 5</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="w4">Bobot untuk Biaya Bulanan</label>
                        <select class="form-select mb-3" name="w4" id="w4" aria-label="w4">
                            <option disabled selected>Apakah Penting untuk Biaya Bulanan ?</option>
                            <option value="1">Sangat Tidak Penting Dengan Point 1</option>
                            <option value="2">Tidak Penting Dengan Point 2 </option>
                            <option value="3">Cukup Penting Dengan Point 3</option>
                            <option value="4">Penting Dengan Point 4</option>
                            <option value="5">Sangat Penting Dengan Point 5</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="w5">Bobot untuk Ekstrakurikuler</label>
                        <select class="form-select mb-3" name="w5" id="w5" aria-label="w5">
                            <option disabled selected>Apakah Penting untuk Ekstrakurikuler ?</option>
                            <option value="1">Sangat Tidak Penting Dengan Point 1</option>
                            <option value="2">Tidak Penting Dengan Point 2 </option>
                            <option value="3">Cukup Penting Dengan Point 3</option>
                            <option value="4">Penting Dengan Point 4</option>
                            <option value="5">Sangat Penting Dengan Point 5</option>
                        </select>
                    </div>
                    
                    <!-- Submit and Back buttons -->
                    <div class="container mt-4" style="margin-bottom: 2rem; padding-bottom: 1rem;">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 mb-2 mb-md-0"> <!-- Kolom untuk tombol "Back", diatur agar mengambil setengah lebar pada perangkat besar dan penuh lebar pada perangkat kecil -->
                                <a href="{{ route('user.mulai_perhitungan') }}" id="submitBtn1" class="btn btn-success>
                                    <i class="fas fa-arrow-left fa-lg"></i> Back
                                </a>
                            </div>
                            <div class="col-md-6"> <!-- Kolom untuk tombol "Simpan Dan Hitung", diatur agar mengambil setengah lebar pada perangkat besar -->
                                <button type="submit" id="submitBtn1" class="btn btn-success">Simpan Dan Hitung</button>
                            </div>
                        </div>
                    </div>

                </form>
            @endif
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
