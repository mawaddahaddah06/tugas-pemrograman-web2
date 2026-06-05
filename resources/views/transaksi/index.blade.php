<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Tambah Transaksi</a>

    {{-- Filter & Search --}}
    <form action="{{ route('transaksi.index') }}" method="GET" class="mb-3">
        <div class="row g-3">
            <div class="col-md-4">
                <select name="member_id" class="form-select">
                    <option value="">-- Filter Member --</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ request('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Transaksi"
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </form>

    {{-- Tabel Transaksi --}}
    <table class="table table-bordered table-striped">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Member</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksis->firstItem() + $loop->index }}</td>
                    <td>{{ $transaksi->jenis }}</td>
                    <td>{{ $transaksi->keterangan }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->member->nama }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('transaksi.show', $transaksi->id) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('transaksi.edit', $transaksi->id) }}">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data Transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $transaksis->links() }}
</x-app>
