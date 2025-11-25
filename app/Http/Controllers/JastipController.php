<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JastipSetting;

class JastipController extends Controller
{
    /**
     * Menampilkan halaman Buka Jastip
     */
    public function index()
    {
        // Ambil data setting terbaru
        $setting = JastipSetting::first();

        return view('bukaJastip', compact('setting'));
    }

    /**
     * Simpan jam buka & tutup
     */
    public function setWaktu(Request $request)
    {
        $request->validate([
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
        ]);

        JastipSetting::updateOrCreate(
            ['id' => 1],
            [
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
            ]
        );

        return redirect()->route('jastip.index')
                         ->with('success', 'Waktu berhasil disimpan.');
    }

    /**
     * Simpan jumlah slot
     */
    public function setSlot(Request $request)
    {
        $request->validate([
            'slot' => 'required|integer|min:1',
        ]);

        JastipSetting::updateOrCreate(
            ['id' => 1],
            ['slot' => $request->slot]
        );

        return redirect()->route('jastip.index')
                         ->with('success', 'Slot berhasil diperbarui.');
    }

    /**
     * Simpan biaya pengiriman
     */
    public function setBiaya(Request $request)
    {
        $request->validate([
            'biaya' => 'required|integer|min:0',
        ]);

        JastipSetting::updateOrCreate(
            ['id' => 1],
            ['biaya' => $request->biaya]
        );

        return redirect()->route('jastip.index')
                         ->with('success', 'Biaya pengiriman berhasil disimpan.');
    }

    /**
     * Mulai sesi jastip
     */
    public function startJastip()
    {
        JastipSetting::updateOrCreate(
            ['id' => 1],
            ['status' => 'open']
        );

        return redirect()->route('jastip.index')
                         ->with('success', 'Sesi jastip berhasil dibuka!');
    }
}
