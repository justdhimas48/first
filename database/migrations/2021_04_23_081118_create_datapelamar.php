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
            $table->id(); 
            $table->string("nama");
            $table->date("tanggal_lahir")->nullable(); 
            $table->string("tempat_lahir")->nullable();
            $table->integer("jenis_kelamin")->nullable(); 
            $table->string("email"); 
            $table->string("no_hp")->nullable(); 
            $table->text("foto_kk")->nullable(); 
            $table->text("foto_ktp")->nullable(); 
            $table->text("foto_ijazah")->nullable(); 
            $table->text("foto_diri")->nullable();
            $table->text("foto_skck")->nullable();
            $table->text("surat_keterangan_sehat")->nullable();
            $table->text("surat_pengalaman_kerja")->nullable();
            $table->text("surat_keterangan_lulus")->nullable();
            $table->enum("pekerjaan_tujuan", ["dosen", 'karyawan'])->default('dosen');
            $table->text("nidn")->nullable();
            $table->text("jurusan_bidang")->default('');
            $table->text("deskripsi_kompetensi_khusus")->nullable();
            $table->text("kompetensi_khusus")->nullable();
            $table->text("pendidikan_s1")->nullable();
            $table->text("pendidikan_s2")->nullable();
            $table->text("pendidikan_s3")->nullable();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger("status")->unsigned(); 
            $table->timestamps();
            //menambahkan primary dan field unik 
            $table->unique('id_user'); 
            //menambahkan relasi 
            $table->foreign('id_user')->references('id')->on('users'); 
            $table->foreign('status')->references('id')->on('tbl_status_pelamar'); 
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
