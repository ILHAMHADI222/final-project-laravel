<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - GoSchool</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <form action="{{ route('validasi-forgot-password-act') }}" method="post" id="reset-password-form">
        @csrf <!-- Add the @csrf tag for CSRF protection -->
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="{{ asset('src/assets/logo.png') }}" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <div class="divider d-flex flex-column align-items-center my-4">
                            <h4 class="text-center fw-bold mx-3 mb-0">Reset Password</h4>
                            <hr class="divider" />
                            <h6 class="text-center fw-bold mx-3 mb-0">Masukkan Kata Sandi Baru</h6>
                        </div>

                        @error('password')
                        <small style="color: red; font-size: 16px;">{{ $message }}</small>
                        @enderror

                        <div class="form-group position-relative mb-4">
                            <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Password Baru">
                            <div class="form-control-icon" onclick="togglePassword('password')">
                                <span class="password-toggle bi bi-eye-slash"></span>
                            </div>
                        </div>
                        <div class="form-group position-relative mb-4">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-xl" placeholder="Konfirmasi Password Baru">
                            <div class="form-control-icon" onclick="togglePassword('confirm_password')">
                                <span class="password-toggle bi bi-eye-slash"></span>
                            </div>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

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

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const fieldType = field.getAttribute('type');
            if (fieldType === 'password') {
                field.setAttribute('type', 'text');
                document.querySelector(`#${fieldId}-toggle`).classList.remove('bi-eye-slash');
                document.querySelector(`#${fieldId}-toggle`).classList.add('bi-eye');
            } else {
                field.setAttribute('type', 'password');
                document.querySelector(`#${fieldId}-toggle`).classList.remove('bi-eye');
                document.querySelector(`#${fieldId}-toggle`).classList.add('bi-eye-slash');
            }
        }

        document.getElementById('reset-password-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting directly

            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

            if (password !== confirmPassword) {
                Swal.fire({
                    position: 'top',
                    icon: 'error',
                    title: 'Password tidak cocok!',
                    text: 'Pastikan password baru dan konfirmasi password sama.',
                    showConfirmButton: true,
                    timer: 3000,
                    width: '300px'
                });
            } else {
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: new FormData(this)
                }).then(response => {
                    if (response.ok) {
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: 'Password berhasil diubah!',
                            text: 'Silahkan login dengan password baru Anda.',
                            showConfirmButton: true,
                            timer: 3000,
                            width: '300px'
                        }).then(() => {
                            // Redirect based on user role
                            const redirectUrl = '{{ auth()->user() ? (auth()->user()->isAdmin() ? route("dashboard_user.index") : route("user.index")) : route("login") }}';
                            window.location.href = redirectUrl;
                        });
                    } else {
                        response.json().then(data => {
                            Swal.fire({
                                position: 'top',
                                icon: 'error',
                                title: 'Error!',
                                text: data.message || 'Terjadi kesalahan, silahkan coba lagi.',
                                showConfirmButton: true,
                                timer: 3000,
                                width: '300px'
                            });
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
            }
        });
    </script>

</body>
</html>
