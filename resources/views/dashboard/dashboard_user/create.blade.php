<!-- resources/views/dashboard/user_dashboard/create.blade.php -->

@extends('Auth.dash')

@section('title', 'Tambah Sekolah')

@section('breadcumb', 'Dashboard / Tambah Sekolah')

@section('content')
<div class="container mt-4">
    <h2>Tambah Sekolah</h2>
    <form action="{{ route('user_dashboard.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_sekolah">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lokasi_sekolah">Lokasi Sekolah</label>
            <input type="text" name="lokasi_sekolah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link_image">Link Gambar</label>
            <input type="text" name="link_image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link_maps">Link Maps</label>
            <input type="text" name="link_maps" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link_web">Link Website</label>
            <input type="text" name="link_web" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="number" name="fasilitas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="akreditasi">Akreditasi</label>
            <input type="number" name="akreditasi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="biaya_bulanan">Biaya Bulanan</label>
            <input type="number" name="biaya_bulanan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="extrakulikuler">Extrakulikuler</label>
            <input type="number" name="extrakulikuler" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
