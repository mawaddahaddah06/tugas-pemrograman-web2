<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endsession

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

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">Member Name</th>
                <th class="text-center">No</th>
                <th class="text-center">Alamat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->firstItem() + $loop->index }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->no_telepon }}</td>
                    <td>{{ $member->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</x-app>
