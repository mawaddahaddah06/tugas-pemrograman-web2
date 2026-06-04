<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['member_id','tanggal_transaksi','jumlah','jenis_transaksi','status'])]
class Transaksi extends Model
{
    use HasFactory;

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}