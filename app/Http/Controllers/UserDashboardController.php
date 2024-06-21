<?php

namespace App\Http\Controllers;

use App\Models\SekolahPlace;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $portfolios = SekolahPlace::all();

        return view('dashboard.dashboard_user.index', compact('portfolios'));
    }

    public function create()
    {
        return view('dashboard.dashboard_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:40',
            'lokasi_sekolah' => 'required',
            'link_image' => 'required|url',
            'link_maps' => 'required|url',
            'link_web' => 'required|url',
            'fasilitas' => 'required|integer',
            'akreditasi' => 'required|integer',
            'biaya_bulanan' => 'required|integer',
            'extrakulikuler' => 'required|integer',
        ]);

        SekolahPlace::create($request->all());

        return redirect()->route('dashboard_user.index')->with('success', 'Sekolah berhasil ditambahkan');
    }

    public function edit($id_sekolah)
    {
        $portfolio = SekolahPlace::findOrFail($id_sekolah);

        return view('dashboard.dashboard_user.edit', compact('portfolio'));
    }

    public function update(Request $request, $id_sekolah)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:40',
            'lokasi_sekolah' => 'required',
            'link_image' => 'required|url',
            'link_maps' => 'required|url',
            'link_web' => 'required|url',
            'fasilitas' => 'required|integer',
            'akreditasi' => 'required|integer',
            'biaya_bulanan' => 'required|integer',
            'extrakulikuler' => 'required|integer',
        ]);

        $portfolio = SekolahPlace::findOrFail($id_sekolah);
        $portfolio->update($request->all());

        return redirect()->route('dashboard_user.index')->with('success', 'Sekolah berhasil diupdate');
    }

    public function destroy($id_sekolah)
    {
        $portfolio = SekolahPlace::findOrFail($id_sekolah);
        $portfolio->delete();

        return redirect()->route('dashboard_user.index')->with('success', 'Sekolah berhasil dihapus');
    }
}
