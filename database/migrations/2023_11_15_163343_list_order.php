<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_order', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telp')->nullable();
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->string('rute')->nullable();
            $table->string('numberorder')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Jika perlu, tambahkan logika pembuangan tabel
        Schema::dropIfExists('list_order');
    }
}
