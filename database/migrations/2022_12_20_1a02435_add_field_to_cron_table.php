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
        Schema::table('mail_cron', function (Blueprint $table) {
            //
			$table->text('data')->after('to_email')->nullable();
			$table->string('subject')->after('to_email')->nullable();
			$table->string('email_page')->after('to_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mail_cron', function (Blueprint $table) {
            //
        });
    }
};
