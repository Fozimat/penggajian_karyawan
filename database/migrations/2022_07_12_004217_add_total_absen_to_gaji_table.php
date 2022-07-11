<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gaji', function (Blueprint $table) {
            $table->integer('total_hadir')->nullable()->after('id_jabatan');
            $table->integer('total_izin')->nullable();
            $table->integer('total_sakit')->nullable();
            $table->integer('total_tanpa_keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gaji', function (Blueprint $table) {
            //
        });
    }
};
