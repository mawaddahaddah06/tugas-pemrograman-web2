<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'transaction_date', 'amount', 'type', 'status', 'description'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}