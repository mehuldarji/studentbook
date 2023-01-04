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
            $table->string('landing_image')->nullable();
            $table->text('about')->nullable();
            $table->text('about_description')->nullable();
            $table->text('footer_text')->nullable();
        });
        
                     DB::table('websitetables')->insert(
            array(
                    'logo' => 'logo.png',
                    'landing_image'=>'company-profile.jpg',
                    'about' => 'AI Student Book (AISC) is a collaborative initiative by the Central Board of Secondary Education (CBSE), the apex body under the Central Government’s Ministry of Education and Intel India.',
                    'about_description'=> 'Student Book (AISC) has been envisaged to help build a digital-first mindset and support an AI-Ready generation. It has been designed as a youth-driven Book of practice enabling collaborative learning, sharing, and creating real-life social impact AI solutions.
                    An online Book for students from all across the country, providing a platform for learning, sharing experiences and leveraging their knowledge to create AI-enabled social impact solutions along with spreading AI awareness in an inclusive way.',
            
                    'footer_text'=> 'Copyright © 2023 . All Rights Reserved.'
           
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
