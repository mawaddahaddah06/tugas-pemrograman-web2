<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('customer.update', $customer->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Customer</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $customer->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', $customer->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" value="{{ old('phone', $customer->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                name="address" value="{{ old('address', $customer->address) }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
                name="birthdate" value="{{ old('birthdate', $customer->birthdate) }}">
            @error('birthdate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('customer.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app>
