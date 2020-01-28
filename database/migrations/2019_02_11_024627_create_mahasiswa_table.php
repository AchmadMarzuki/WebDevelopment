<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mahasiswa_id')->unsigned();
            $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->integer('nim')->nullable();
            $table->string('email')->nullable();
            $table->string('prodi')->nullable();
            $table->timestamps();
            // $table->string('tempat_lahir')->nullable();
            // $table->date('tgl_lahir')->nullable();
            // $table->enum('jk', ['L', 'P']);
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
