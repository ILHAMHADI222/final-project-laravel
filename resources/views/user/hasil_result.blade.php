@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4 fw-bold">Hasil Perhitungan Sekolah Terbaik Metode TOPSIS</h2>
    <hr class="divider">
    <div class="container">
        <div class="row">
            @if($results->isEmpty())
                <p class="text-center">Tidak ada hasil perhitungan untuk ditampilkan</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Hasil Perhitungan</th>
                            <th class="text-center">Peringkat Terbaik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $index => $result)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $result->nama_sekolah }}</td>
                                <td>{{ $result->hasil }}</td>
                                <td class="text-center">{{ $index + 1 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="container mt-4" style="margin-bottom: 2rem; padding-bottom: 1rem;">
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6 mb-2 mb-md-0"> <!-- Kolom untuk tombol "Ulang Perhitungan" -->
            <a href="{{ route('user.index') }}" id="submitBtn1" class="btn btn-success">
                <i class="fas fa-arrow-left fa-lg"></i> Ulang Perhitungan
            </a>
        </div>
        <div class="col-md-6"> <!-- Kolom untuk tombol "Logout" -->
            <a href="{{ route('index') }}" id="submitBtn1" class="btn btn-success">
                <i class="fas fa-arrow-left fa-lg"></i> Logout
            </a>
        </div>
    </div>
</div>

    </div>
</div>
@endsection
