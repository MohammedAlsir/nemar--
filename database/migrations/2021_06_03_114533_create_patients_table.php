<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender')->nullable();
            $table->string('patient_name');
            $table->string("phone");
            $table->string('password');
            $table->string("email")->nullable();
            $table->bigInteger('blood_type')->nullable();
            $table->string('chronic_disease')->nullable();
            $table->string('sensitive')->nullable();
            $table->string('gentics_disease')->nullable();
            $table->string('social_status')->nullable();
            $table->string('bad_happit')->nullable();
            $table->date('birth')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('patients');
    }
}
