<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @forelse ($customers as $customer)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $customer->name }} -- {{ $customer->gender }} -- {{ $customer->email }} --
                {{ $customer->phone }} -- {{ $customer->address }} -- {{ $customer->birthdate }}
            </li>
        @empty
            <li class="list-group-item text-center">
                Tidak ada data Customer
            </li>
        @endforelse
    </ul>
</x-app>
