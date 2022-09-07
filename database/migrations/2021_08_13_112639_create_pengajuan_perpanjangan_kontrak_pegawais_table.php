<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanPerpanjanganKontrakPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_perpanjangan_kontrak_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kontrak_pegawai')->unsigned();
            $table->string('analisis_sdm')->collation('utf8mb4_general_ci');
            $table->string('keputusan_pimpinan')->collation('utf8mb4_general_ci')->nullable();
            $table->integer('status');
            $table->foreign('id_kontrak_pegawai')->references('id')->on('tbl_kontrak_pegawai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_perpanjangan_kontrak_pegawais');
    }
}
