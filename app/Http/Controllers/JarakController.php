<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JarakController extends Controller
{
    public function showSelectedSchools()
    {
        $userId = Auth::id();
        $selectedSchools = School::with(['alternatifs' => function ($query) use ($userId) {
            $query->where('users_id', $userId);
        }])->get();

        return view('user.mulai_perhitungan', compact('selectedSchools'));
    }

    public function simpanJarak(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'id_sekolah' => 'required|exists:sekolah_place,id_sekolah',
            'jarak' => 'required|numeric',
        ]);

        $userId = Auth::id();

        // Menyimpan jarak ke dalam model atau tabel yang sesuai
        $alternatif = Alternatif::updateOrCreate(
            [
                'sekolah_place_id_sekolah' => $validatedData['id_sekolah'],
                'users_id' => $userId,
            ],
            [
                'jarak' => $validatedData['jarak'],
            ]
        );

        return redirect()->back()->with('success', 'Jarak berhasil disimpan.');
    }
}
