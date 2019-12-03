<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('user_type');
            $table->integer('vendor_status');
            // $table->string('location_address');
            $table->string('phone_number');
            $table->string('businsess_logo');
            $table->string('gender');
            // $table->string('website_facebook_page');
            // $table->LongText('description');
            $table->string('profession');
            // $table->string('building');
            // $table->string('shop_number');
            $table->integer('terms_conditions');
            $table->string('name');
    $table->string('address_address')->nullable();
    $table->double('address_latitude')->nullable();
    $table->double('address_longitude')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type']);
        });
    }
}
