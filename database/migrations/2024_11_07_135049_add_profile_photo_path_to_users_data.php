<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePhotoPathToUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_data', function (Blueprint $table) {
            $table->string('profile_photo_path')->nullable()->after('grows');
        });
    }

    public function down()
    {
        Schema::table('users_data', function (Blueprint $table) {
            $table->dropColumn('profile_photo_path');
        });
    }
}
