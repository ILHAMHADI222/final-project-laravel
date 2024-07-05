<?php

namespace App\Http\Controllers;

use App\Models\SekolahPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $portfolios = DB::table('sekolah_place')->get();

        return view('user.index', ['portfolios' => $portfolios]);
    }
}
