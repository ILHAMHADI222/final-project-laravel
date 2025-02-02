<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BACK SCHOOL</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('src/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bold" href="#page-top">BACK SCHOOL</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav d-flex align-items-center justify-content-start ms-auto my-2 my-lg-0" style="gap: 0.5rem;">
                        <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Daftar Sekolah</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                        <li class="nav-item"><a class="btn btn-primary" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-outline-primary" href="register">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Pilih Sekolah Menengah Kejuruan Mu Sekarang !</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Back School adalah website sistem pendukung keputusan yang akan membantu anda untuk pemilihan SMK swasta terbaik di kota tegal</p>
                        <a class="btn btn-primary btn-xl" href="#about">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <img src="{{asset('src/assets/logo.png')}}" style="width: 300px;" alt="logo">
                        <h1 class="text-white">Back To School</h1>
                        <h2 class="text-white mt-0"> Bingung?
                            Tak Perlu khawatir Untuk Memilih SMK mu Lagi</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Back To School atau sering dikenal dengan Back school adalah layanan sistem pendukung keputusan untuk memilih SMK swasta terbaik di kota tegal dengan menggunakan metode TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution)</p>
                        <a class="btn btn-light btn-xl" href="{{ route('login') }}">Mulai Sekarang</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0 fw-bold">Kriteria Yang Digunakan Pada Sistem Ini</h2>
        <hr class="divider" />
        
        <!-- First Row: 3 elements centered -->
        <div class="row justify-content-center gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Jarak</h3>
                    <p class="text-muted mb-0">Jarak adalah suatu kriteria bersifat cost yang dimana jarak ini di isi calon perserta didik dengan mengisi jarak alamat rumah ke sekolah</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Fasilitas</h3>
                    <p class="text-muted mb-0">Fasilitas adalah suatu kriteria bersifat benefit yang dimana fasilitas ini sudah diisi oleh admin mengenai fasilitas SMK tersebut</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Akreditasi</h3>
                    <p class="text-muted mb-0">Akreditasi adalah suatu kriteria yang bersifat benefit yang dimana Akreditasi ini sudah diisi oleh admin dengan mengambil data sebelumnya</p>
                </div>
            </div>
        </div>
        
        <!-- Second Row: 2 elements centered -->
        <div class="row justify-content-center gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Biaya Perbulan</h3>
                    <p class="text-muted mb-0">Biaya Perbulan adalah suatu kriteria yang bersifat cost yang dimana user memilih range harga sesuai keinginan</code></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                    <h3 class="h4 mb-2">Extrakulikuler</h3>
                    <p class="text-muted mb-0">Extrakulikuler adalah suatu kriteria yang bersifat benefit yang dimana sudah di isi oleh admin</p>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- Portfolio-->
        <div id="portfolio">
    <h2 class="text-center mt-0 fw-bold">Daftar Sekolah Menengah Kejuruan Swasta</h2>
    <hr class="divider" />
    <div class="container-fluid p-0">
        <div class="row g-0">
            @foreach($portfolios as $portfolio)
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ $portfolio->link_image }}" title="{{ $portfolio->nama_sekolah }}">
                    <img class="img-fluid" src="{{ $portfolio->link_image }}" alt="{{ $portfolio->nama_sekolah }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">GO SCHOOL</div>
                        <div class="project-name">{{ $portfolio->nama_sekolah }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <hr class="divider" />
                        <h2 class="mt-0 fw-bold">Raih SMK Terbaikmu Sekarang !</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Contact Us</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
    <!-- * * * * * * * * * * * * * * * *-->
    <!-- * * SB Forms Contact Form * *-->
    <!-- * * * * * * * * * * * * * * * *-->
    <!-- This form is pre-integrated with SB Forms.-->
    <!-- To make this form functional, sign up at-->
    <!-- https://startbootstrap.com/solution/contact-forms-->
    <!-- to get an API token!-->
    <form id="contactForm" action="https://formspree.io/f/xnqeyjog" method="POST">
        <!-- Name input-->
        <div class="form-floating mb-3">
            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
            <label for="name">Full name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
        </div>
        <!-- Email address input-->
        <div class="form-floating mb-3">
            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
        </div>
        <!-- Phone number input-->
        <div class="form-floating mb-3">
            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
            <label for="phone">Phone number</label>
            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
        </div>
        <!-- Message input-->
        <div class="form-floating mb-3">
            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
            <label for="message">Message</label>
            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
        </div>
        <!-- Submit success message-->
        <!-- This is what your users will see when the form has successfully submitted-->
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                To activate this form, sign up at
                <br />
                <a href="https://linkedin.com/in/ilham">Ilham Dev</a>
            </div>
        </div>
        <!-- Submit error message-->
        <!-- This is what your users will see when there is an error submitting the form-->
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <!-- Submit Button-->
        <div class="d-grid">
            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
@if (session('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ session('message') }}")
        </script>
    @elseif (session('error'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ session('error') }}")
        </script>
    @endif

            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - Ilham Hadi Developer</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('src/js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
