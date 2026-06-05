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

        // pencarian berdasarkan jenis atau keterangan
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
}
