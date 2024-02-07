<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmrahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umrahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->string('status');
            $table->string('thumbnail');
            $table->string('banner');
            $table->integer('harga');
            $table->string('hotel');
            $table->string('maskapai');
            $table->longText('itenary');
            $table->longText('harga_termasuk');
            $table->longText('harga_tidak');
            $table->longText('pendaftaran');
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
        Schema::dropIfExists('umrahs');
    }
}
