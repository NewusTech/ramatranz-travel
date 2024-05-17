<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanans_id');
            $table->foreign('layanans_id')->references('id')->on('layanans')->onDelete('cascade');

            $table->unsignedBigInteger('fasilitas_id');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas_layanans')->onDelete('cascade');
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
        Schema::dropIfExists('fasilitas_tags');
    }
}
