<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <h2>Data Customer</h2>

    <ul class="list-group">
        @foreach ($customers as $customer)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $customer->name }} -- {{ $customer->email }} --
                {{ $customer->phone }} -- {{ $customer->address }} -- {{ $customer->birthdate }}
            </li>
            <a class="btn btn-warning btn-sm" href="{{ route('customer.edit', $customer) }}" role="button">Edit</a>
        @endforeach
    </ul>
</x-app>
