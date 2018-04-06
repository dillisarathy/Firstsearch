<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('job_role');
            $table->text('job_description');
            $table->string('specialization');
            $table->string('qualification');
            $table->string('key_skills');
            $table->string('experience');
            $table->string('location');
            $table->string('interview_dates');
            $table->string('company_name');
            $table->text('company_profile');
            $table->string('address');
            $table->string('email_address');
            $table->string('contact_number');
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
        Schema::dropIfExists('job_details');
    }
}
