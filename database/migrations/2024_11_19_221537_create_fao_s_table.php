<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaoSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the FAO entry
            $table->string('phone_number'); // Contact number
            $table->string('location'); // Location of FAO
            $table->string('services')->nullable(); // List of services (optional)
            $table->text('description')->nullable(); // Description (optional)
            $table->unsignedBigInteger('city_id'); // City foreign key
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('picture')->nullable(); // Path to the picture (optional)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_a_o_s');
    }
}
