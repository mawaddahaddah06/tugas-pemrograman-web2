<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'title' => 'Customer',
            //'customers' => Customer::latest()->get(),
            'customers' => Customer::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create', ['title' => 'Create Customer']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:customers',
                'phone' => 'required|max:15',
                'birth_date' => 'required|date',
                'address' => 'required',
                'gender' => 'required|in:Male,Female',
            ], [
                'name.required' => 'Nama customer wajib diisi',
                'name.max' => 'Nama customer tidak boleh lebih dari :max karakter',

                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',

                'phone.required' => 'Nomor telepon wajib diisi',
                'phone.max' => 'Nomor telepon tidak boleh lebih dari :max karakter',

                'birth_date.required' => 'Tanggal lahir wajib diisi',
                'birth_date.date' => 'Format tanggal lahir tidak valid',

                'address.required' => 'Alamat wajib diisi',
            ]);

            Customer::create($validated);

            DB::commit();
            return to_route('customer.index')->withSuccess('Data Pelanggan Berhasil Ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Terjadi kesalahan: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'title' => 'Edit Customer',
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
    'name'      => 'required|max:255',
    'email'     => 'required|email|unique:customers,email,' . $customer->id,
    'phone'     => 'required|max:20',
    'address'   => 'required|max:255',
    'birth_date' => 'required|date',
], [
    'name.required'      => 'Nama wajib diisi',
    'name.max'           => 'Nama tidak boleh lebih dari :max karakter',
    'email.required'     => 'Email wajib diisi',
    'email.email'        => 'Email harus valid',
    'email.unique'       => 'Email sudah terdaftar',
    'phone.required'     => 'Nomor telepon wajib diisi',
    'phone.max'          => 'Nomor telepon maksimal :max karakter',
    'address.required'   => 'Alamat wajib diisi',
    'address.max'        => 'Alamat tidak boleh lebih dari :max karakter',
    'birth_date.required' => 'Tanggal lahir wajib diisi',
    'birth_date.date'     => 'Tanggal lahir harus berupa format tanggal',
]);

$customer->update($validated);

return to_route('customer.index')->withSuccess('Data Customer Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
    $customer->delete();
    return to_route('customer.index')->withSuccess('Data Customer Berhasil Dihapus');
}

    }
