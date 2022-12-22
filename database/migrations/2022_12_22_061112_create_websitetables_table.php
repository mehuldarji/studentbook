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
        Schema::create('websitetables', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('logo');
			$table->string('type');
            $table->text('about')->nullable();
            $table->text('about_description')->nullable();
        });
        
                DB::table('websitetables')->insert(
        array(
             'logo' => 'logo.png',
			 'type' => 'brand_logo',
            'about' => 'brand logo',
            'about_description'=> 'Copyright © 2022 Student Book. Designed by Spruko All rights reserved.'
           
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websitetables');
    }
};
