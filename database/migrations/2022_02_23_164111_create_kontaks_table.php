<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('alamat')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('email');
            $table->string('phone_tr_1');
            $table->string('phone_tr_2');
            $table->string('phone_cr_1');
            $table->string('phone_cr_2');
            $table->string('wa_1')->nullable();
            $table->string('wa_2')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('kontaks');
    }
}
