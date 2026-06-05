<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('member.update', $member->id) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Member</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                value="{{ old('nama', $member->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon"
                name="nomor_telepon" value="{{ old('nomor_telepon', $member->nomor_telepon) }}">
            @error('nomor_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', $member->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('member.index') }}">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-app>
