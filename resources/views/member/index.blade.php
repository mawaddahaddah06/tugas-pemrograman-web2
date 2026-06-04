<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

    {{-- Form Search --}}
    <form action="">
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
                <th class="text-center align-middle" style="width: 5%">No</th>
                <th class="text-center align-middle" style="width: 25%">Nama</th>
                <th class="text-center align-middle" style="width: 20%">Nomor Telepon</th>
                <th class="text-center align-middle" style="width: 40%">Alamat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $members->firstItem() + $loop->index }}</td>
                    <td>{{ $member->nama }}</td>
                    <td>{{ $member->nomor_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</x-app>
