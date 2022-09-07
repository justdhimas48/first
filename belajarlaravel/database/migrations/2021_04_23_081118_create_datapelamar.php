<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapelamar', function (Blueprint $table) { 
            $table->string("pi"); 
            $table->string("nama");
            $table->text("ttl"); 
            $table->integer("usia"); 
            $table->string("jk"); 
            $table->string("email"); 
            $table->integer("hp"); 
            $table->string("medsos"); 
            $table->string("pendidikan_terakhir"); 
            $table->string("nama_instansi"); 
            $table->integer("tahun_masuk");
            $table->integer("tahun_lulus");
            $table->string("penghargaan");
            $table->string("nama_perusahaan");
            $table->string("posisi");
            $table->string("identitas_atasan");
            $table->string("gaji_terakhir");
            $table->string("jenis_pekerjaan");
            $table->string("keahlian_utama");
            $table->text("fc_kk");
            $table->text("fc_ktp");
            $table->text("fc_ijazah");
            $table->text("transkrip_nilai");
            $table->text("foto");
            $table->text("skck");
            $table->text("surat_keterangan_sehat");
            $table->text("sertifikat");
            $table->text("surat_keterangan_pengalaman_kerja");
            $table->bigInteger('id_user')->unsigned();
            $table->timestamps();
            //menambahkan primary dan field unik 
            $table->primary('pi'); 
            $table->unique('id_user'); 
            //menambahkan relasi 
            $table->foreign('id_user')->references('id')->on('users'); 
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapelamar'); 
    }
}
