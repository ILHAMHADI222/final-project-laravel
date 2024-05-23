        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login - Mazer Admin Dashboard</title>
            <link rel="stylesheet" href="assets/css/main/app.css">
            <link rel="stylesheet" href="assets/css/pages/auth.css">
            <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico')}}" type="image/x-icon">
            <link rel="shortcut icon" href="{{ asset('src/assets/favicon.ico')}}" type="image/png">
        </head>
        <body>
        <form action="{{ route('register.save') }}" method="POST" class="User">
            @csrf <!-- Tambahkan tag @csrf untuk CSRF protection -->
            <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="src/assets/logo.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="divider d-flex align-items-center my-4">
                    <h3 class="text-center fw-bold mx-3 mb-0">Register</h3>
                    </div>
                                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl" placeholder="Name"> <!-- Menambahkan atribut name -->
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control form-control-xl" placeholder="Email"> <!-- Menambahkan atribut name -->
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password"> <!-- Menambahkan atribut name -->
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password"> <!-- Menambahkan atribut name -->
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

           
                    <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">Ingat Saya</label>
                    </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Apakah sudah punya akun? <a href="login" class="link-danger">Login</a></p>
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
        </body>
        </html>
