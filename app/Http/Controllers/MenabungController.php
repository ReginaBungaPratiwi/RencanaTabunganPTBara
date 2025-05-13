<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Menabung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenabungController extends Controller
{
    public function store(Request $request, Tabungan $tabungan)
    {
        $request->validate([
            'nominal' => 'required|numeric|min:1',
            'tanggal' => 'required|date',
        ]);

        // Buat data menabung
        Menabung::create([
            'user_id' => Auth::id(),
            'tabungan_id' => $tabungan->id,
            'nominal' => $request->nominal,
            'tanggal' => $request->tanggal,
        ]);

        // Update total tabungan
        $tabungan->updateNominalTerkumpul();

        return redirect()->route('tabungan.show', $tabungan->id)->with('success', 'Setoran berhasil ditambahkan!');
    }
}
