<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('informasi_id')->unsigned();
            // $table->foreign('informasi_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_sekolah')->nullable();
            $table->string('nis', 25)->nullable();
            $table->text('alamat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('kuota')->unsigned();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('informasi');
    }
}
