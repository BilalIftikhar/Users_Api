<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalMachineryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('rental_machineries', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Machinery name
        $table->string('phone_number'); // Contact number
        $table->string('location'); // Physical location
        $table->unsignedBigInteger('city_id'); // City foreign key
        $table->text('services'); // List of services (JSON or comma-separated)
        $table->text('description')->nullable(); // Additional information
        $table->string('picture')->nullable(); // Picture path
        $table->timestamps();

        $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_machineries');
    }
}
