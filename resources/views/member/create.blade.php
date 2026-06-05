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

        <form action="{{ route('member.store') }}" method="POST">
            @csrf
            <!-- Input Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Member</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
            </div>

            <!-- Input Nomor Telepon -->
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control"
                    value="{{ old('nomor_telepon') }}">
            </div>

            <!-- Input Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>

            <a class="btn btn-warning" href="{{ route('member.index') }}" role="button">
                Cancel
            </a>
            <button type="submit" class="btn btn-success">
                Submit
            </button>
        </form>
    </div>
</body>

</html>
