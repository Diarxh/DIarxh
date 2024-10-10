<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Mengubah nama kolom ke bahasa Inggris
            $table->renameColumn('Nama', 'name');
            $table->renameColumn('Email', 'email');
            $table->renameColumn('No_Telp', 'phone_number');
            $table->renameColumn('Nama_Sekolah', 'school_name');
            $table->renameColumn('Nuptk', 'nuptk');
            $table->renameColumn('Foto', 'photo');
            $table->renameColumn('Tanggal_Lahir', 'birth_date');
            $table->renameColumn('Tempat_Lahir', 'birth_place');
            $table->renameColumn('Alamat', 'address');
            $table->renameColumn('Desa', 'village');
            $table->renameColumn('Kecamatan', 'district');
            $table->renameColumn('Kabupaten', 'city');
            $table->renameColumn('Provinsi', 'province');
            $table->renameColumn('Pendidikan_Terakhir', 'last_education');
            $table->renameColumn('User_Id', 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            // Mengembalikan nama kolom ke nama semula
            $table->renameColumn('name', 'Nama');
            $table->renameColumn('email', 'Email');
            $table->renameColumn('phone_number', 'No_Telp');
            $table->renameColumn('school_name', 'Nama_Sekolah');
            $table->renameColumn('nuptk', 'Nuptk');
            $table->renameColumn('photo', 'Foto');
            $table->renameColumn('birth_date', 'Tanggal_Lahir');
            $table->renameColumn('birth_place', 'Tempat_Lahir');
            $table->renameColumn('address', 'Alamat');
            $table->renameColumn('village', 'Desa');
            $table->renameColumn('district', 'Kecamatan');
            $table->renameColumn('city', 'Kabupaten');
            $table->renameColumn('province', 'Provinsi');
            $table->renameColumn('last_education', 'Pendidikan_Terakhir');
            $table->renameColumn('user_id', 'User_Id');
        });
    }
}
