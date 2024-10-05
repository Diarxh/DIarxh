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
        Schema::rename('perusahaans', 'companies');
        Schema::rename('gurus', 'teachers');
        Schema::rename('pelatihans', 'trainings');
        Schema::rename('tipe_pelatihans', 'training_types');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('companies', 'perusahaans');
        Schema::rename('teachers', 'gurus');
        Schema::rename('trainings', 'pelatihans');
        Schema::rename('training_types', 'tipe_pelatihans');
    }
};
