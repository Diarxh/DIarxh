<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTrainingsTable extends Migration
{
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Pastikan company_id dan training_type_id adalah unsigned
            $table->unsignedBigInteger('company_id')->change();
            $table->unsignedBigInteger('training_type_id')->change();

            // Menambahkan foreign key constraint
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('training_type_id')->references('id')->on('training_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Menghapus foreign key jika rollback
            $table->dropForeign(['company_id']);
            $table->dropForeign(['training_type_id']);
        });
    }
}
