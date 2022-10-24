<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('lyrics');
            $table->string('image');
            $table->tinyInteger('approve')->default(1);
            $table->dateTime('publish');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('artist_id');
            $table->string('file');
            $table->unsignedBigInteger('plays');
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
        Schema::dropIfExists('tracks');
    }
};
