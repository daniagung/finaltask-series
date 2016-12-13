<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matakuliah_id')->unsigned()->nullable();
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade');

            $table->integer('mahasiswa_id')->unsigned()->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');

            $table->string('tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('data')->nullable();


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
        Schema::drop('presensi');
    }
}
