<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // transaksi_id
            $table->string('jenis');        // jenis transaksi (misalnya: cash, transfer)
            $table->string('keterangan');   // keterangan transaksi
            $table->date('tanggal');        // tanggal transaksi
            $table->unsignedBigInteger('member_id'); // relasi ke member
            $table->timestamps();

            // foreign key ke tabel members
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
