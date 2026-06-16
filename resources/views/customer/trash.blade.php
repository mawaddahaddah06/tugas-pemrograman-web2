<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @forelse ($customers as $customer)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $customer->name }} -- {{ $customer->gender }} -- {{ $customer->email }} --
                {{ $customer->phone }} -- {{ $customer->address }} -- {{ $customer->birthdate }}
            </li>
            <form action="{{ route('customer.restore', $customer->id) }}" method="POST" class="d-inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-warning btn-sm"
                    onclick="return confirm('Anda Yakin Ingin Mengembalikan Data Ini?')">Restore</button>
            </form>
        @empty
            <li class="list-group-item text-center">
                Tidak ada data Customer
            </li>
        @endforelse
    </ul>
</x-app>
