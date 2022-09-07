<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi_pegawai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pegawai')->unsigned();
            $table->bigInteger('id_kategori_unit_kerja_sebelum')->unsigned();
            $table->bigInteger('id_kategori_unit_kerja_sesudah')->unsigned();
            // $table->string('pekerjaan_awal');
            // $table->string('jabatan_awal');
            // $table->string('pekerjaan_tujuan');
            // $table->string('jabatan_tujuan');
            $table->string('deskripsi')->collation('utf8mb4_general_ci');
            $table->text('surat_keterangan_pindah_unit')->nullable();
            $table->text('lampiran');
            $table->bigInteger('dimutasi_oleh')->unsigned();
            $table->foreign('id_pegawai')->references('id')->on('tbl_datapegawai'); 
            $table->foreign('dimutasi_oleh')->references('id')->on('users'); 
            $table->foreign('id_kategori_unit_kerja_sebelum')->references('id')->on('tbl_kategori_unit_kerja'); 
            $table->foreign('id_kategori_unit_kerja_sesudah')->references('id')->on('tbl_kategori_unit_kerja'); 
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
        Schema::dropIfExists('mutasi_pegawais');
    }
}
