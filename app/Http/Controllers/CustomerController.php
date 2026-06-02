<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'title' => 'Customer',
            'customers' => Customer::all(),
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
        $validated = $request->validate([
    'name'      => 'required|max:255',
    'email'     => 'required|email|unique:customers',
    'phone'     => 'required|max:20',
    'address'   => 'required|max:255',
    'birthdate' => 'required|date',
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
    'birthdate.required' => 'Tanggal lahir wajib diisi',
    'birthdate.date'     => 'Tanggal lahir harus berupa format tanggal',
]);

Customer::create($validated);

return to_route('customer.index')->withSuccess('Data Customer Berhasil Ditambahkan');

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
    'birthdate' => 'required|date',
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
    'birthdate.required' => 'Tanggal lahir wajib diisi',
    'birthdate.date'     => 'Tanggal lahir harus berupa format tanggal',
]);

$customer->update($validated);

return to_route('customer.index')->withSuccess('Data Customer Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
