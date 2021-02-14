<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('third_name');
            $table->string('family_name');
            $table->string('mother_name');
            $table->string('mother_family');
            $table->string('famous_name');
            $table->date('birthday');
            $table->string('mother_national');
            $table->string('photo',250);
            $table->string('gender');
            $table->string('country');
            $table->string('briefness');
            $table->string('city');
            $table->string('region');
            $table->date('dead_date');
            $table->string('dead_region');
            $table->string('dead_country');
            $table->text('dead_reason');
            $table->string('mobile');
            $table->string('phone');
            $table->text('description');
            $table->string('his_job');
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
        Schema::dropIfExists('person');
    }
}
