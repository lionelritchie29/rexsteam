<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->text('description');
            $table->longText('long_description');
            $table->string('developer');
            $table->string('publisher');
            $table->string('image_cover_path');
            $table->string('trailer_video_path');
            $table->date('release_date');
            $table->boolean('contain_adult_content');
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
        Schema::dropIfExists('games');
    }
}
