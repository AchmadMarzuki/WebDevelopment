<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mendaftar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_daftar');
            $table->integer('mahasiswa_id')->unsigned();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->integer('informasi_id')->unsigned();
            $table->foreign('informasi_id')->references('id')->on('informasi')->onDelete('cascade');
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir');
            $table->enum('status', ['Disetujui', 'Belum_disetujui']);
            $table->text('ket')->nullable();
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
        Schema::dropIfExists('mendaftar');
    }
}

