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
        Schema::table('teachers', function (Blueprint $table) {
            $table->text('about')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('about');
        });
    }

};