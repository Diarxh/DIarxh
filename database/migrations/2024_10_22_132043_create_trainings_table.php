<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('requirements');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('registration_start_date');
            $table->date('registration_end_date');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('training_type_id');
            $table->string('training_location');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('training_type_id')->references('id')->on('training_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};