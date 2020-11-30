<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNanpaPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nanpa_places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place_name');
            $table->integer('genre')->default(0);
            $table->integer('score')->default(0);
            $table->double('longitude', 8,6);
            $table->double('latitude', 9,6);
            $table->integer('open_flag')->default(1)->comment('0:非表示, 1:表示');
            $table->integer('ratio')->comment("男女比率");
            $table->integer('icon');
            $table->integer('start_time');
            $table->integer('end_time');
            $table->integer('start_age_group');
            $table->integer('end_age_group');
            $table->string('memo')->nullable();
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
        Schema::dropIfExists('nanpa_posts');
    }
}
