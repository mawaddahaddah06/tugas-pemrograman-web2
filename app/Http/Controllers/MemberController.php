<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $members = Member::latest();
        $keyword = $request->input('keyword');         

        if ($keyword) {
            $members->where('nama', 'like', '%' . $keyword . '%')
                    ->orWhere('nomor_telepon', 'like', '%' . $keyword . '%')
                    ->orWhere('alamat', 'like', '%' . $keyword . '%');
        }

        return view('member.index', [
            'title' => 'Member',
            'members' => $members->paginate(10)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('member.create', [
            'title' => 'Tambah Member',
        ]);
    }

    public function edit(Member $member)
{
    return view('member.edit', [
        'title'  => 'Edit Member',
        'member' => $member,
    ]);
}

public function update(Request $request, Member $member)
{
    $validated = $request->validate([
    'nama'          => 'required|string|max:100',
    'nomor_telepon' => 'required|string|max:20',
    'alamat'        => 'required|string|min:10|max:255',
], [
    'nama.required'          => 'Nama Member wajib diisi',
    'nama.max'               => 'Nama Member maksimal 100 karakter',

    'nomor_telepon.required' => 'Nomor Telepon wajib diisi',
    'nomor_telepon.max'      => 'Nomor Telepon maksimal 20 karakter',

    'alamat.required'        => 'Alamat wajib diisi',
    'alamat.min'             => 'Alamat minimal 10 karakter',
    'alamat.max'             => 'Alamat maksimal 255 karakter',
]);

    $member->update($validated);

    return redirect()->route('member.index')->with('success', 'Data Member berhasil diubah');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nama'          => 'required|string|max:100',
        'nomor_telepon' => 'required|string|max:20',
        'alamat'        => 'required|string|min:10|max:255',
    ], [
        'nama.required'          => 'Nama Member wajib diisi',
        'nama.max'               => 'Nama Member maksimal 100 karakter',

        'nomor_telepon.required' => 'Nomor Telepon wajib diisi',
        'nomor_telepon.max'      => 'Nomor Telepon maksimal 20 karakter',

        'alamat.required'        => 'Alamat wajib diisi',
        'alamat.min'             => 'Alamat minimal 10 karakter',
        'alamat.max'             => 'Alamat maksimal 255 karakter',
    ]);

    Member::create($validated);

    return redirect()->route('member.index')->with('success', 'Data Member berhasil ditambahkan');
}
}