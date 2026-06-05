<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Member;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::with('member')->latest();

        // filter berdasarkan member
        if ($request->member_id) {
            $transaksis->where('member_id', $request->member_id);
        }

        // pencarian berdasarkan jenis/keterangan
        if ($request->keyword) {
            $transaksis->where(function ($query) use ($request) {
                $query->where('jenis', 'like', '%' . $request->keyword . '%')
                      ->orWhere('keterangan', 'like', '%' . $request->keyword . '%');
            });
        }

        return view('transaksi.index', [
            'title'      => 'Transaksi',
            'transaksis' => $transaksis->paginate(10)->withQueryString(),
            'members'    => Member::all(),
        ]);
    }

    public function create()
    {
        return view('transaksi.create', [
            'title'   => 'Tambah Transaksi',
            'members' => Member::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis'      => 'required|string|max:50',
            'keterangan' => 'required|string|max:255',
            'tanggal'    => 'required|date',
            'member_id'  => 'required|exists:members,id',
        ]);

        Transaksi::create($validated);

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', [
            'title'     => 'Detail Transaksi',
            'transaksi' => $transaksi,
        ]);
    }

    public function edit(Transaksi $transaksi)
    {
       //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
{
    // Validasi input
    $validated = $request->validate([
        'jenis'      => 'required|string|max:50',
        'keterangan' => 'required|string|max:255',
        'tanggal'    => 'required|date',
        'member_id'  => 'required|exists:members,id',
    ]);

    // Update data transaksi
    $transaksi->update($validated);

    // Redirect kembali ke index dengan pesan sukses
    return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil diubah');
}

    }

    public function destroy(Transaksi $transaksi)
    {
        
    }
}
