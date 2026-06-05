<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah Member --}}
    <a href="{{ route('member.create') }}" class="btn btn-success mb-3">Tambah Member</a>

    {{-- Form Search --}}
    <form action="{{ route('member.index') }}" method="GET">
        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search Member"
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </form>

    {{-- Tabel Member --}}
    <table class="table table-bordered table-striped">
        <thead class="table-success text-center">
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Nama</th>
                <th style="width: 20%">Nomor Telepon</th>
                <th style="width: 40%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $members->firstItem() + $loop->index }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data Member</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $members->links() }}
</x-app>
