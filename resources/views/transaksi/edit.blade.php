<form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Input Jenis -->
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis Transaksi</label>
        <input type="text" name="jenis" id="jenis" class="form-control"
            value="{{ old('jenis', $transaksi->jenis) }}">
    </div>

    <!-- Input Keterangan -->
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
    </div>

    <!-- Input Tanggal -->
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control"
            value="{{ old('tanggal', $transaksi->tanggal) }}">
    </div>

    <!-- Dropdown Member -->
    <div class="mb-3">
        <label for="member_id" class="form-label">Pilih Member</label>
        <select name="member_id" id="member_id" class="form-select">
            @foreach ($members as $member)
                <option value="{{ $member->id }}"
                    {{ old('member_id', $transaksi->member_id) == $member->id ? 'selected' : '' }}>
                    {{ $member->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <a class="btn btn-warning" href="{{ route('transaksi.index') }}">Cancel</a>
    <button type="submit" class="btn btn-success">Update</button>
</form>
