<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Title of the information
            $table->text('description')->nullable(); // Additional information
            $table->string('picture')->nullable(); // Image path
            $table->string('audio_link')->nullable(); // Optional audio link
            $table->string('video_link')->nullable(); // Optional video link
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
        Schema::dropIfExists('information_banks');
    }
}
