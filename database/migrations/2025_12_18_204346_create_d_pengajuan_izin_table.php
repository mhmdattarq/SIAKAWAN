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
        Schema::create('d_pengajuan_izin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->string('jenis_izin'); // sakit, cuti, izin
            $table->text('alasan');

            $table->enum('status', ['pending', 'disetujui', 'ditolak'])
                ->default('pending');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_pengajuan_izin');
    }
};