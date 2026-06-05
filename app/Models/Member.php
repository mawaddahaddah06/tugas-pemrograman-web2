<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nomor_telepon', 'alamat', ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}