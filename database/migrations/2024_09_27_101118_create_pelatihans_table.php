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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('persyaratan');
            $table->string('tanggal_mulai');
            $table->string('tanggal_akhir');
            $table->string('tanggal_pendaftaran');
            $table->string('tanggal_akhir_pendaftaran');
            $table->string('id_perusahaan');
            $table->string('tipe_id');
            $table->string('tempat_pelatihan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};
