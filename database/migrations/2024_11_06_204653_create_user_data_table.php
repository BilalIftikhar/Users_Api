<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cnic')->unique();
            $table->string('phone_number');
            $table->string('password');
            $table->string('city');
            $table->float('cultivated_area');
            $table->json('grows')->nullable();  // JSON field for 'grows'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_data');
    }
}
