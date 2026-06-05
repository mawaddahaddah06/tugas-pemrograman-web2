<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Filter & Search --}}
    <form action="{{ route('transaksi.index') }}" method="GET">
        <div class="row g-3 mb-3">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksis->firstItem() + $loop->index }}</td>
                    <td>{{ $transaksi->jenis }}</td>
                    <td>{{ $transaksi->keterangan }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->member->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transaksis->links() }}
</x-app>
