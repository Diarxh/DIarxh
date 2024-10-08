<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->renameColumn('nama', 'name');
            $table->renameColumn('deskripsi', 'description');
            $table->renameColumn('persyaratan', 'requirements');
            $table->renameColumn('tanggal_mulai', 'start_date');
            $table->renameColumn('tanggal_akhir', 'end_date');
            $table->renameColumn('tanggal_pendaftaran', 'registration_start_date');
            $table->renameColumn('tanggal_akhir_pendaftaran', 'registration_end_date');
            $table->renameColumn('perusahaan_id', 'company_id');
            $table->renameColumn('tipe_pelatihan_id', 'training_type_id');
            $table->renameColumn('tempat_pelatihan', 'training_location');
        });

        Schema::table('training_types', function (Blueprint $table) {
            $table->renameColumn('nama_tipe_pelatih', 'trainer_type_name');
            $table->renameColumn('deskripsi_tipe_pelatih', 'trainer_type_description');
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->renameColumn('name', 'nama');
            $table->renameColumn('description', 'deskripsi');
            $table->renameColumn('requirements', 'persyaratan');
            $table->renameColumn('start_date', 'tanggal_mulai');
            $table->renameColumn('end_date', 'tanggal_akhir');
            $table->renameColumn('registration_start_date', 'tanggal_pendaftaran');
            $table->renameColumn('registration_end_date', 'tanggal_akhir_pendaftaran');
            $table->renameColumn('company_id', 'perusahaan_id');
            $table->renameColumn('training_type_id', 'tipe_pelatihan_id');
            $table->renameColumn('training_location', 'tempat_pelatihan');
        });

        Schema::table('training_types', function (Blueprint $table) {
            $table->renameColumn('trainer_type_name', 'nama_tipe_pelatih');
            $table->renameColumn('trainer_type_description', 'deskripsi_tipe_pelatih');
        });
    }
};