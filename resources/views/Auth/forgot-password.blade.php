<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>forgot-password goschool</title>
            <link rel="stylesheet" href="assets/css/main/app.css">
            <link rel="stylesheet" href="assets/css/pages/auth.css">
            <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico')}}" type="image/x-icon">
            <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico')}}" type="image/png">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
        <body>
    ...
    <form action="{{ route('forgot-password-act') }}" method="POST" class="User" id="forgot-password-form">
        @csrf <!-- Tambahkan tag @csrf untuk CSRF protection -->
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="src/assets/logo.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <div class="divider d-flex flex-column align-items-center my-4">
                            <h4 class="text-center fw-bold mx-3 mb-0">Forgot password</h4>
                            <hr class="divider" />
                            <h6 class="text-center fw-bold mx-3 mb-0">Peringatan: Masukan E-mail yang sudah terdaftar</h6>
                        </div>

                        @error('email')
                            <small style="color: red; font-size: 16px;">{{ $message }}</small>
                        @enderror

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="Email"> <!-- Menambahkan atribut name -->
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 custom-bg">
                <!-- Copyright -->
                <div class="text-white mb-3 mb-md-0">
                    Copyright © 2024. Ilham Hadi Developer.
                </div>
                <!-- Right -->
                <div>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#!" class="text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </section>
    </form>
    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dari pengiriman langsung

            // Asumsikan email berhasil dikirimkan setelah form disubmit
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this)
            }).then(response => {
                if (response.ok) {
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: 'Email Terkirim!',
                        text: 'Silahkan check gmail Anda.',
                        showConfirmButton: true,
                        timer: 3000,
                        width: '300px'
                    });
                } else {
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan, silahkan coba lagi.',
                        showConfirmButton: true,
                        timer: 3000,
                        width: '300px'
                    });
                }
            }).catch(error => {
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan, silahkan coba lagi.',
                    showConfirmButton: true,
                    timer: 3000,
                    width: '300px'
                });
            });
        });
    </script>
</body>

        </body>
        </html>

