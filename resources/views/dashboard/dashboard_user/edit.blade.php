<!-- resources/views/dashboard/user_dashboard/edit.blade.php -->
 
@extends('Auth.dash')
@section('title', 'Edit Sekolah')

@section('breadcumb', 'Dashboard / Edit Sekolah')

@section('content')
<div class="container mt-4">
    <h2>Edit Sekolah</h2>
    <form action="{{ route('user_dashboard.update', $portfolio->id_sekolah) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_sekolah">Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control" value="{{ $portfolio->nama_sekolah }}" required>
        </div>
        <div class="form-group">
            <label for="lokasi_sekolah">Lokasi Sekolah</label>
            <input type="text" name="lokasi_sekolah" class="form-control" value="{{ $portfolio->lokasi_sekolah }}" required>
        </div>
        <div class="form-group">
            <label for="link_image">Link Gambar</label>
            <input type="text" name="link_image" class="form-control" value="{{ $portfolio->link_image }}" required>
        </div>
        <div class="form-group">
            <label for="link_maps">Link Maps</label>
            <input type="text" name="link_maps" class="form-control" value="{{ $portfolio->link_maps }}" required>
        </div>
        <div class="form-group">
            <label for="link_web">Link Website</label>
            <input type="text" name="link_web" class="form-control" value="{{ $portfolio->link_web }}" required>
        </div>
        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="number" name="fasilitas" class="form-control" value="{{ $portfolio->fasilitas }}" required>
        </div>
        <div class="form-group">
            <label for="akreditasi">Akreditasi</label>
            <input type="number" name="akreditasi" class="form-control" value="{{ $portfolio->akreditasi }}" required>
        </div>
        <div class="form-group">
            <label for="biaya_bulanan">Biaya Bulanan</label>
            <input type="number" name="biaya_bulanan" class="form-control" value="{{ $portfolio->biaya_bulanan }}" required>
        </div>
        <div class="form-group">
            <label for="extrakulikuler">Extrakulikuler</label>
            <input type="number" name="extrakulikuler" class="form-control" value="{{ $portfolio->extrakulikuler }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
