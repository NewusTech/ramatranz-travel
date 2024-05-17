<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->references('id')->on('users');
            $table->string('title');
            $table->string('slug');
            $table->longText('content');
            $table->string('meta_desc')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('short_description')->nullable();
            $table->date('posted_ad');
            $table->string('media')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
