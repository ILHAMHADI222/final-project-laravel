<?php

namespace App\Http\Controllers;

use App\Models\V_topsis_hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan users_id dari pengguna yang sedang login
        $userId = Auth::id();

        // Mengambil data berdasarkan users_id dan mengurutkannya berdasarkan hasil secara descending
        $results = V_topsis_hasil::where('id', $userId)
            ->orderBy('hasil', 'desc')
            ->get();

        return view('user.hasil_result', compact('results'));
    }
}
