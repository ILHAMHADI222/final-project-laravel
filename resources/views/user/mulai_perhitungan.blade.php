@extends('layouts.navbar')

@extends('layouts.app')

@section('content')
<div id="portfolio">
    <h2 class="text-center mt-4 fw-bold">Masukan Bobot Ke Sekola Yang Anda Pilih</h2>
    <hr class="divider">
    <div class="container">
        <div class="row">
            @if($selectedSchools->isEmpty())
                <p class="text-center">Tidak ada sekolah yang dipilih</p>
            @else
                @foreach($selectedSchools as $school)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm" style="background-color: #CF0723; color: white;">
                            <a href="{{ $school->link_image }}" title="{{ $school->nama_sekolah }}">
                                <img class="card-img-top img-fluid" src="{{ $school->link_image }}" alt="{{ $school->nama_sekolah }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $school->nama_sekolah }}</h5>
                                <p class="card-text">{{ $school->lokasi_sekolah }}</p>
                                <a href="{{ $school->link_web }}" class="btn btn-primary" style="background-color: white; color: #CF0723;" title="Lihat Detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    let selectedCount = 0;
    const maxSelection = 5;
    const checkboxes = document.querySelectorAll('.select-card');
    const selectedIds = [];

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                selectedCount++;
                selectedIds.push(this.value);
            } else {
                selectedCount--;
                const index = selectedIds.indexOf(this.value);
                if (index > -1) {
                    selectedIds.splice(index, 1);
                }
            }

            if (selectedCount === maxSelection) {
                const url = `/user/mulai_perhitungan?selectedIds=${selectedIds.join(',')}`;
                window.location.href = url;
            }
        });
    });
});
</script>
@endsection
