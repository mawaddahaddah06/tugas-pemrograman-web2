<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('member.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Member</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $member->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Nomor Telepon -->
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon"
                class="form-control @error('nomor_telepon') is-invalid @enderror"
                value="{{ old('nomor_telepon', $member->nomor_telepon) }}">
            @error('nomor_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $member->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">
            Update Member
        </button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</x-app>
