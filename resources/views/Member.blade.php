<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <h2>Data Member</h2>

    <ul class="list-group">
        @foreach ($members as $member)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $member->name }} -- {{ $member->email }} --
                {{ $member->phone }} -- {{ $member->address }} -- {{ $member->birthdate }}

                <a class="btn btn-warning btn-sm" href="{{ route('member.edit', $member) }}" role="button">Edit</a>
                <form action="{{ route('member.destroy', $member) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app>
