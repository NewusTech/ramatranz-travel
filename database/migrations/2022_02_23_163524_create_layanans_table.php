<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('jenis_layanan_id')->nullable()->references('id')->on('jenis_layanans');
            $table->string('title');
            $table->string('slug');
            $table->string('intro');
            $table->text('content');
            $table->string('image')->nullable();
            $table->double('price')->nullable();
            $table->string('asal')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('jenis_carter')->nullable();
            $table->string('wa')->nullable();
            $table->boolean('isNegotiatable')->default(1);
            $table->text('jadwal_berangkat')->nullable();
            $table->text('rute_berangkat')->nullable();

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
        Schema::dropIfExists('layanans');
    }
}
