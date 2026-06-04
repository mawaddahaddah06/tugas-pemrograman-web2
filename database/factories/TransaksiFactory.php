<?php

namespace Database\Factories;

use App\Models\Transaksi;
use App\Models\Member; // ✅ tambahkan ini
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => Member::factory(), // relasi ke Member
            'tanggal_transaksi' => fake()->date(),
            'jumlah' => fake()->randomFloat(2, 10000, 500000),
            'jenis_transaksi' => fake()->randomElement(['Pembelian','Iuran','Top-up']),
            'status' => fake()->randomElement(['pending','sukses','gagal']),
        ];
    }
}
