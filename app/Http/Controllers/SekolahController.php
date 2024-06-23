<?php

namespace App\Http\Controllers;

use App\Models\SekolahPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan Anda mengimpor model Sekolah jika digunakan

class SekolahController extends Controller
{
    public function mulaiPerhitungan(Request $request)
    {
        $selectedIds = $request->query('selectedIds');
        $selectedIdsArray = explode(',', $selectedIds);

        $selectedSchools = SekolahPlace::whereIn('id_sekolah', $selectedIdsArray)->get();

        return view('user.mulai_perhitungan', compact('selectedSchools'));
    }

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
