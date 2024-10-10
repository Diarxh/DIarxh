<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            // Mengubah nama kolom ke bahasa Inggris
            $table->renameColumn('Nama_Perusahaan', 'company_name');
            $table->renameColumn('Alamat', 'address');
            $table->renameColumn('No_Telp', 'phone_number');
            $table->renameColumn('Email', 'email');
            $table->renameColumn('logo', 'logo');
            $table->renameColumn('description', 'description');
            $table->renameColumn('created_at', 'created_at');
            $table->renameColumn('updated_at', 'updated_at');
            $table->renameColumn('user_id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            // Mengembalikan nama kolom ke nama semula
            $table->renameColumn('company_name', 'Nama_Perusahaan');
            $table->renameColumn('address', 'Alamat');
            $table->renameColumn('phone_number', 'No_Telp');
            $table->renameColumn('email', 'Email');
            $table->renameColumn('logo', 'logo');
            $table->renameColumn('description', 'description');
            $table->renameColumn('created_at', 'created_at');
            $table->renameColumn('updated_at', 'updated_at');
            $table->renameColumn('user_id', 'user_id');
        });
    }
}
