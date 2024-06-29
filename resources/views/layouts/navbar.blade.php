<div class="container mt-4" style="margin-bottom: 2rem; padding-bottom: 1rem;">
    <div class="container">
        <div class="row mt-3 mb-3 justify-content-between align-items-center">
            <div class="col-auto">
                <a href="javascript:history.go(-1);" id="submitBtn1" class="btn btn-secondary btn-lg">
                    <i class="fas fa-arrow-left fa-lg"></i> Back
                </a>
            </div>
            <div class="col-auto">
                <!-- Tombol "Selanjutnya" dengan form -->
                <button type="button" id="submitBtn" class="btn btn-success" disabled onclick="submitForm()">Selanjutnya</button>
                <!-- Form untuk pengisian jarak (akan di-submit saat tombol "Selanjutnya" diklik) -->
                <form id="jarakForm" action="/simpan_jarak" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    <div class="mb-3">
                        <label for="jarak_{{ $school->id }}" class="form-label">Jarak ke sekolah (km)</label>
                        <input type="text" class="form-control" id="jarak_{{ $school->id }}" name="jarak_{{ $school->id }}" placeholder="Masukkan jarak ke sekolah">
                    </div>
                </form>
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
    function submitForm() {
        // Mengambil form untuk pengisian jarak
        var form = document.getElementById('jarakForm');
        // Mengirim form
        form.submit();
    }
</script>
    