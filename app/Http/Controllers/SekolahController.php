<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Import DB facade jika belum di-import

class SekolahController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel 'sekolah_places' menggunakan query builder
        $portfolios = DB::table('sekolah_places')->get();

        // Debugging untuk memastikan data yang diambil
        // dd($portfolios);

        // Mengirimkan data ke view 'user.index' menggunakan compact()
        return view('user.index', ['portfolios' => $portfolios]);
    }
}
