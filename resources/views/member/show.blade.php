<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('member.index') }}" role="button">Back</a>

    <h6>Data Member</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama: {{ $member->nama }}</li>
        <li class="list-group-item">Nomor Telepon: {{ $member->nomor_telepon }}</li>
        <li class="list-group-item">Alamat: {{ $member->alamat }}</li>
        <li class="list-group-item">Created At: {{ $member->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $member->updated_at->diffForHumans() }}</li>
    </ul>
</x-app>
