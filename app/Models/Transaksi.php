<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['jenis', 'keterangan', 'tanggal', 'member_id'];


    // Relasi ke Member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
