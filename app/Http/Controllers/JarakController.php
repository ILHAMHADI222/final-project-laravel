<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\SekolahPlace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JarakController extends Controller
{
    public function showSelectedSchools(Request $request)
    {
        $selectedIds = $request->query('selectedIds', '');
        $selectedIdsArray = is_string($selectedIds) ? explode(',', $selectedIds) : [];
        $selectedSchools = SekolahPlace::whereIn('id_sekolah', $selectedIdsArray)->get();

        return view('user.mulai_perhitungan', compact('selectedSchools'));
    }

    public function simpanJarak(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'jarak' => 'required|array',
            'jarak.*' => 'required|numeric',
            'id_sekolah' => 'required|array',
            'id_sekolah.*' => 'required|exists:sekolah_place,id_sekolah',
        ]);

        foreach ($validatedData['jarak'] as $sekolahId => $jarak) {
            Alternatif::updateOrCreate(
                [
                    'sekolah_place_id_sekolah' => $sekolahId,
                    'users_id' => $userId,
                ],
                [
                    'jarak' => $jarak,
                ]
            );
        }

        $selectedIds = implode(',', array_keys($validatedData['jarak']));

        return redirect()->route('user.hitung_bobot', ['selectedIds' => $selectedIds]);
    }

    public function hitungBobot(Request $request)
    {
        $selectedIds = $request->input('selectedIds', '');
        $selectedIdsArray = is_string($selectedIds) ? explode(',', $selectedIds) : [];
        $userId = Auth::id();

        $selectedSchools = SekolahPlace::whereIn('id_sekolah', $selectedIdsArray)
            ->whereHas('alternatifs', function ($query) use ($userId) {
                $query->where('users_id', $userId)
                      ->whereNotNull('jarak');
            })
            ->get();

        return view('user.hitung_bobot', compact('selectedSchools'));
    }

    public function simpanBobot(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'w1' => 'required|numeric|min:1|max:5',
            'w2' => 'required|numeric|min:1|max:5',
            'w3' => 'required|numeric|min:1|max:5',
            'w4' => 'required|numeric|min:1|max:5',
            'w5' => 'required|numeric|min:1|max:5',
        ]);

        $user = User::find($userId);
        $user->w1 = $validatedData['w1'];
        $user->w2 = $validatedData['w2'];
        $user->w3 = $validatedData['w3'];
        $user->w4 = $validatedData['w4'];
        $user->w5 = $validatedData['w5'];
        $user->save();

        return redirect()->route('user.hasil_result');
    }
}
