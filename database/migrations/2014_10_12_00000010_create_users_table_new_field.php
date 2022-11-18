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

        Schema::table('users', function (Blueprint $table) {
            $table->text('about')->after('password')->nullable();
            $table->string('instagram_link')->after('password')->nullable();
            $table->string('facebook_link')->after('password')->nullable();
            $table->string('twitter_link')->after('password')->nullable();
            $table->string('youtube_link')->after('password')->nullable();
            $table->string('photo')->after('password')->nullable();
            $table->string('headline')->after('password')->nullable();
            $table->string('location')->after('password')->nullable();
            $table->string('phone')->after('password')->nullable();
            $table->string('language')->after('password')->nullable();
            $table->string('b_month')->after('password')->nullable();
            $table->string('b_date')->after('password')->nullable();
            $table->string('b_year')->after('password')->nullable();
            $table->string('gender')->after('password')->nullable();
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
            $table->dropColumn('about');
            $table->dropColumn('instagram_link');
            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('youtube_link');
            $table->dropColumn('photo');
            $table->dropColumn('headline');
            $table->dropColumn('location');
            $table->dropColumn('phone');
            $table->dropColumn('language');
            $table->dropColumn('b_month');
            $table->dropColumn('b_date');
            $table->dropColumn('b_year');
            $table->dropColumn('gender');
        });
    }
};
