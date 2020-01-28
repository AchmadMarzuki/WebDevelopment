<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosbingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosbing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosbing_id')->unsigned();
            $table->foreign('dosbing_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_dosen')->nullable();
            $table->integer('nip')->nullable();
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
        Schema::dropIfExists('dosbing');
    }
}
