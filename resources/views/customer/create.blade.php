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

        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <!-- Input Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama Customer</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <!-- Input Gender -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="">-- Select Gender --</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <!-- Input Nomor Telepon -->
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <!-- Input Alamat -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
            </div>

            <!-- Input Tanggal Lahir -->
            <div class="mb-3">
                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control"
                    value="{{ old('birthdate') }}">
            </div>

            <a class="btn btn-warning" href="{{ route('customer.index') }}">Cancel</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
