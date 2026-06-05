<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>{{ $title }}</h1>

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <!-- Input Jenis -->
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Transaksi</label>
                <input type="text" name="jenis" id="jenis" class="form-control" value="{{ old('jenis') }}">
            </div>

            <!-- Input Keterangan -->
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
            </div>

            <!-- Input Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
            </div>

            <!-- Dropdown Member -->
            <div class="mb-3">
                <label for="member_id" class="form-label">Pilih Member</label>
                <select name="member_id" id="member_id" class="form-select">
                    <option value="">-- Pilih Member --</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol -->
            <a class="btn btn-warning" href="{{ route('transaksi.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>

</html>
