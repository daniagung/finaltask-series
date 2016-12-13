<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matakuliah_id')->unsigned()->nullable();
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade');

            $table->string('hari')->nullable();
            $table->string('waktu')->nullable();
            $table->string('ruangan')->nullable();

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
        Schema::drop('jadwal');
    }
}
