@extends('layouts.app')

@section('content')
    <div id="portfolio">
        <h2 class="text-center mt-4 fw-bold">Pilihlah Sekolah Menengah Kejuruan Swasta Anda</h2>
        <hr class="divider">
        <div class="container">
            <div class="row">
                @if($portfolios->isEmpty())
                    <p class="text-center">No data found</p>
                @else
                    @foreach($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 shadow-sm" style="background-color: #CF0723; color: white;">
                                <a href="{{ $portfolio->link_image }}" title="{{ $portfolio->nama_sekolah }}">
                                    <img class="card-img-top img-fluid" src="{{ $portfolio->link_image }}" alt="{{ $portfolio->nama_sekolah }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $portfolio->nama_sekolah }}</h5>
                                    <p class="card-text">{{ $portfolio->lokasi_sekolah }}</p>
                                    <a href="{{ $portfolio->link_web }}" class="btn btn-primary btn-lihat-detail" title="Lihat Detail">Lihat Detail</a>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input select-card" type="checkbox" value="{{ $portfolio->id_sekolah }}" id="portfolio_{{ $portfolio->id_sekolah }}">
                                        <label class="form-check-label" for="portfolio_{{ $portfolio->id_sekolah }}">
                                            Pilih
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-bottom: 2rem; padding-bottom: 1rem;">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto mb-2 mb-md-0"> <!-- Menambahkan mb-2 untuk margin-bottom pada perangkat kecil dan mb-md-0 untuk margin-bottom nol pada perangkat sedang dan besar -->
            <a href="#" id="submitBtn1" class="btn btn-success" onclick="goBackAndRefresh()">
                <i class="fas fa-arrow-left fa-lg"></i> Pilih Ulang
            </a>
        </div>
        <div class="col-auto"> <!-- Menambahkan class col-auto untuk ukuran kolom otomatis -->
            <form id="selectSchoolsForm" action="/user/mulai_perhitungan" method="GET">
                @csrf
                <input type="hidden" name="selectedIds" id="selectedIds">
                <button type="submit" id="submitBtn" class="btn btn-success" disabled>Selanjutnya</button>
            </form>
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

        /* Gaya tombol "Lihat Detail" */
        .btn-lihat-detail {
            background-color: white;
            color: #CF0723;
        }

        .btn-lihat-detail:hover {
            background-color: #CF0723;
            color: white;
        }

        /* Gaya tombol "Submit" */
        #submitBtn {
            background-color: #CF0723;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
            padding: 14px 70px; /* Sesuaikan ukuran padding sesuai kebutuhan */
        }
        #submitBtn1 {
            background-color: #CF0723;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
            padding: 14px 70px; /* Sesuaikan ukuran padding sesuai kebutuhan */
        }

        #submitBtn:hover {
            background-color: #9e041b;
        }
    </style>

    <script>
        function goBackAndRefresh() {
            // Kembali ke halaman sebelumnya
            history.go(-1);

            // Atau bisa juga menggunakan
            // window.location.href = document.referrer;

            // Me-refresh halaman sebelumnya
            setTimeout(function() {
                location.reload(true);
            }, 0);
        }

        document.addEventListener('DOMContentLoaded', function () {
            let selectedCount = 0;
            const maxSelection = 6;
            const checkboxes = document.querySelectorAll('.select-card');
            const selectedIds = [];
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('selectSchoolsForm');
            const selectedIdsInput = document.getElementById('selectedIds');

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
                        submitBtn.removeAttribute('disabled');
                    } else {
                        submitBtn.setAttribute('disabled', 'disabled');
                    }

                    // Update hidden input with selected IDs
                    selectedIdsInput.value = selectedIds.join(',');
                });
            });

            // Submit form on button click
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault();
                form.submit();
            });
        });
    </script>
@endsection
