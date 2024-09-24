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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            
            $table->string('Nama');
            $table->string('Email');
            $table->string('No_Telp');
            $table->string('Nama_Sekolah');
            $table->string('Nuptk');
            $table->string('Foto')->nullabel();
            $table->string('Tanggal_Lahir');
            $table->string('Tempat_Lahir');
            $table->string('Alamat');
            $table->string('Desa');
            $table->string('Kecamatan');
            $table->string('Kabupaten');
            $table->string('Provinsi');
            $table->string('Pendidikan_Terakhir');
            $table->unsignedBigInteger('User_Id');
            $table->foreign('User_Id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
