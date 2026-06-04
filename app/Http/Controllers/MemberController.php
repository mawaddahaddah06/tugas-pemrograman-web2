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
        //return view('members.create', ['title' => 'Tambah Member']);
    }

    public function store(Request $request)
    {
        // nanti di Commit 3 kita isi validasi & simpan data
    }

    public function show(Member $member)
    {
        //return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        //return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // nanti di Commit 4 kita isi validasi & update data
    }

    public function destroy(Member $member)
    {
        // nanti di Commit 5 kita isi fungsi hapus data
    }
}
