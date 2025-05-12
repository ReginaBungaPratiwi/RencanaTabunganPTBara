<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Tabungan::where('user_id', Auth::id())->get();
        return view('tabungan.index', compact('tabungans'));
    }

    public function create()
    {
        return view('tabungan.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'target_nominal' => 'required|numeric',
        'target_tanggal' => 'required|date',
        'foto' => 'nullable|image|max:2048',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('tabungan', 'public');
    }

    Tabungan::create([
        'user_id' => Auth::id(),
        'judul' => $request->judul,
        'target_nominal' => $request->target_nominal,
        'target_tanggal' => $request->target_tanggal,
        'foto' => $fotoPath,
        'nominal_terkumpul' => 0, // Default nilai nominal terkumpul
        'tercapai' => $request->tercapai, // Status tercapai default
    ]);

    return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil dibuat!');
}


    public function show(Tabungan $tabungan)
    {
        $this->authorizeUser($tabungan);
        return view('tabungan.show', compact('tabungan'));
    }

    public function edit(Tabungan $tabungan)
    {
        $this->authorizeUser($tabungan);
        return view('tabungan.edit', compact('tabungan'));
    }

    public function update(Request $request, Tabungan $tabungan)
{
    $this->authorizeUser($tabungan);

    $request->validate([
        'judul' => 'required|string|max:255',
        'target_nominal' => 'required|numeric',
        'target_tanggal' => 'required|date',
        'foto' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        if ($tabungan->foto) {
            Storage::disk('public')->delete($tabungan->foto);
        }
        $tabungan->foto = $request->file('foto')->store('tabungan', 'public');
    }

    // Update data tabungan
    $tabungan->update([
        'judul' => $request->judul,
        'target_nominal' => $request->target_nominal,
        'target_tanggal' => $request->target_tanggal,
        'foto' => $tabungan->foto,
        'tercapai' => $tabungan->nominal_terkumpul >= $tabungan->target_nominal, // Cek apakah tabungan tercapai
    ]);

    return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil diupdate!');
}

    public function destroy(Tabungan $tabungan)
    {
        $this->authorizeUser($tabungan);

        if ($tabungan->foto) {
            Storage::disk('public')->delete($tabungan->foto);
        }

        $tabungan->delete();
        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil dihapus!');
    }

    protected function authorizeUser(Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
