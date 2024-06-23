<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BACK SCHOOL')</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
     <link href="{{ asset('src/css/styles.css')}}" rel="stylesheet" />
    <!-- SimpleLightbox plugin CSS -->
    <!-- Ganti dengan link CSS SimpleLightbox jika diperlukan -->
</head>
<body>
    <div class="container">
        <!-- Header dengan logo dan tulisan Backschool -->
        <div class="d-flex align-items-center py-3">
            <div>
                <img src="{{ asset('src/assets/favicon.ico')}}" alt="Logo" style="width: 50px; height: auto;">
            </div>
            <div class="ml-3">
                <h4 class="navbar-brand fw-bold">BACK SCHOOL</h4>
            </div>
        </div>

        <!-- Konten dari setiap halaman -->
        @yield('content')
    </div>

    <!-- Link ke Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
