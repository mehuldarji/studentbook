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
        Schema::create('poll_analysis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id');
            $table->bigInteger('user_id');
            $table->string('option');
            $table->bigInteger('option_index');
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
        Schema::dropIfExists('poll_analysis');
    }
};
